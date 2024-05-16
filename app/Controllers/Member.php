<?php

    namespace App\Controllers;

    use App\Models\Member as MemberModel;
    use App\Controllers\BaseController;
    use CodeIgniter\HTTP\ResponseInterface;

    class Member extends BaseController
    {

        public function __construct(){
           $this->memberModel = new MemberModel();
        }

        public function index()
        {   
            
            $data = [
                'members' => $this->memberModel->getPaginatedMembers(10, 10),
                'pager' => $this->memberModel->pager
            ];

            return view('/admin/pages/Member_table', $data);
        }

        public function addMemberForm() {
            return view('/admin/forms/Member_form');
        }


        public function save(){

            $validation = \config\Services::validation();

            $rules = [
                'm_first_name' => 'required|min_length[3]|max_length[50]',
                'm_last_name' => 'required|min_length[3]|max_length[50]',
                'm_dob' => 'required|valid_date',
                'm_address' => 'required|max_length[255]',
                'm_status' => 'required|in_list[active, inactive]',
                'm_gender' => 'required|in_list[male, female]',
                'm_phone' => 'required|numeric|exact_length[10]'
            ];

            if($validation->run($this->request->getPost(), null, $rules)) {
                $data = [
                    'm_first_name' => $this->request->getPost('m_first_name'),
                    'm_last_name' => $this->request->getPost('m_last_name'),
                    'm_address' => $this->request->getPost('address'),
                    'm_dob' => $this->request->getPost('dob'),
                    'm_status' => $this->request->getPost('status'),
                    'm_gender' => $this->request->getPost('gender'),
                    'm_phone' => $this->request->getPost('phone')
                ];

                $result = $this->memberModel->createMember($data);
                if($result) {
                    return redirect()->to('member-table');
                } else {
                    return "Something went worng";
                }
            } else {
                $errors = $validation->getErros();
                foreach($errors as $error)
                    echo $error. '<br>';
            }


            
        }
        
    }
