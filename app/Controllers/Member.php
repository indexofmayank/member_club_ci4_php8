<?php

namespace App\Controllers;

use App\Models\Member as MemberModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Member extends BaseController
{
    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }

    public function index()
    {
        $data = [
            "members" => $this->memberModel->getPaginatedMembers(10, 10),
            "pager" => $this->memberModel->pager,
        ];

        return view("/admin/pages/Member_table", $data);
    }

    public function addMemberForm()
    {
        return view("/admin/forms/Member_form");
    }

    public function save()
    {
        helper(["form"]);
        $validation = \config\Services::validation();

        $data = [];
        if ($this->request->getMethod() == "post") {
            $rules = [
                "m_first_name" => "required|min_length[3]|max_length[50]",
                "m_last_name" => "required|min_length[3]|max_length[50]",
                "dob" => [
                    "required",
                    "valid_date",
                    function($dob) {
                        $currentYear = date('Y');
                        $birthYear = date('Y', strtotime($dob));
                        return $birthYear < 2024;
                    }
                ],
                "address" => "required|max_length[255]|min_length[10]",
                "status" => "required|in_list[active, inactive]",
                "gender" => "required|in_list[male, female]",
                "phone" => "required|numeric|exact_length[10]",
            ];

            $errors = [
                'dob' => [
                    'valid_date' => 'The Date of Birth is not valid',
                    'required' => 'The Date of Birth is required',
                    'dob_check' => 'The Date of Birth must be before the year 2024'
                ]
            ];

            $validation->setRules($rules, $errors);

            if ($validation->withRequest($this->request)->run()) {
                $data = [
                    "m_first_name" => $this->request->getPost("m_first_name"),
                    "m_last_name" => $this->request->getPost("m_last_name"),
                    "m_address" => $this->request->getPost("address"),
                    "m_dob" => $this->request->getPost("dob"),
                    "m_status" => $this->request->getPost("status"),
                    "m_gender" => $this->request->getPost("gender"),
                    "m_phone" => $this->request->getPost("phone"),
                ];

                $result = $this->memberModel->createMember($data);
                if($result) {
                    return redirect()->to('/member-table');
                } else {
                    return "Something went wrong";
                }
            } else {
                $data['validation'] = $validation;
                return view('admin/forms/Member_form', $data);
            }
        } else {
            return "Something worng happend, please try to contact Mayank";
        }

        // return view('admin/forms/Member_form', $data);
    }
}
