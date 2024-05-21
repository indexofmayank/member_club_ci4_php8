<?php

namespace App\Controllers;

use App\Models\Member as MemberModel;
use App\Controllers\BaseController;

class Member extends BaseController
{
    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }

    public function index()
    {   


        $pager = \Config\Services::pager();
        $perPage = 10;
        $data = [
            "members" => $this->memberModel->orderBy('m_id', 'DESC')->paginate($perPage, 'group1'),
            "pager" => $this->memberModel->pager,
            "pager_group" => 'group1',
        ];

        return view("/admin/pages/Member_table", $data);
    }

    public function showImage($id)
    {
        $member = $this->memberModel->find($id);
        if($member) {
            $imageData = $member['m_photo'];
            header('Content-Type: image/jpeg');
            return $this->response->setContentType('jpg')->setBody($imageData);
        } else {
            echo "Image not found";
        }

    }

    public function addMemberForm()
    {
        return view("/admin/forms/Member_form");
    }

    public function save()
{
    helper(['form']);
    $validation = \Config\Services::validation();

    if ($this->request->getMethod() == "post") {

        $photoFile = $this->request->getFile('photo');
        $photoData = file_get_contents($photoFile->getTempName());


        $rules = [
            "m_first_name" => "required|min_length[3]|max_length[50]",
            "m_last_name" => "required|min_length[3]|max_length[50]",
            "dob" => "required|valid_date",
            "address" => "required|max_length[255]|min_length[10]",
            "status" => "required|in_list[active,inactive]",
            "gender" => "required|in_list[male,female]",
            "phone" => "required|numeric|exact_length[10]",
        ];

        $errors = [
            'dob' => [
                'required' => 'The Date of Birth is required.',
                'valid_date' => 'The Date of Birth is not valid.',
            ],
        ];

        $validation->setRules($rules, $errors);

        if ($validation->withRequest($this->request)->run()) {
            // Check if DOB is before 2024
            $dob = date_create($this->request->getPost("dob"));
            if ($dob && date_format($dob, 'Y') >= 2024) {
                $validation->setError('dob', 'The Date of Birth should be before 2024.');
                $data['validation'] = $validation;
                return view('admin/forms/Member_form', $data);
            }

            $data = [
                "m_first_name" => $this->request->getPost("m_first_name"),
                "m_last_name" => $this->request->getPost("m_last_name"),
                "m_address" => $this->request->getPost("address"),
                "m_dob" => $this->request->getPost("dob"),
                "m_status" => $this->request->getPost("status"),
                "m_gender" => $this->request->getPost("gender"),
                "m_phone" => $this->request->getPost("phone"),
                "m_photo" => $photoData,
            ];

            $result = $this->memberModel->createMember($data);
            if ($result) {
                return redirect()->to('/member-table');
            } else {
                return "Something went wrong";
            }
        } else {
            $data['validation'] = $validation;
            return view('admin/forms/Member_form', $data);
        }
    } else {
        return "Something went wrong, please try to contact Mayank";
    }
}





}
