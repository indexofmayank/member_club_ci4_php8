<?php

namespace App\Controllers;

use App\Models\Member as MemberModel;
use App\Models\DocumentModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\Files\UploadedFile;

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
        $sortColumn = $this->request->getGet('sort_column') ?? 'm_id';
        $sortDirection = $this->request->getGet('sort_direction') ?? 'ASC';
        
        // Validate sortColumn to avoid SQL Injection
        $validColumns = ['m_first_name', 'm_last_name', 'm_dob', 'm_address', 'm_status', 'm_gender'];
        if (!in_array($sortColumn, $validColumns)) {
            $sortColumn = 'm_id';
        }

        //Retrive search item
        $searchTerm = $this->request->getGet('search');
        if(!empty($searchTerm)){
            $this->memberModel->groupStart();
            $this->memberModel->like('m_first_name', $searchTerm);
            $this->memberModel->orLike('m_last_name', $searchTerm);

            //Add similar coditions for other columns as needed
            $this->memberModel->groupEnd();
        }


        $data = [
            "members" => $this->memberModel->orderBy($sortColumn, $sortDirection)->paginate($perPage, 'group1'),
            "pager" => $this->memberModel->pager,
            "pager_group" => 'group1',
            "sort_column" => $sortColumn,
            "sort_direction" => $sortDirection,
            "searchTerm" => $searchTerm
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

            $uploadedFiles = $this->request->getFiles();

            $rules = [
                "m_first_name" => "required|min_length[3]|max_length[50]",
                "m_last_name" => "required|min_length[3]|max_length[50]",
                "dob" => "required|valid_date",
                "address" => "required|max_length[255]|min_length[10]",
                "status" => "required|in_list[active,inactive]",
                "gender" => "required|in_list[male,female]",
                "phone" => "required|numeric|exact_length[10]",
                "photo" => "uploaded[photo]|mime_in[photo,image/jgp,image/jpeg]|max_size[photo,2048]",
            ];

            $errors = [
                'dob' => [
                    'required' => 'The Date of Birth is required.',
                    'valid_date' => 'The Date of Birth is not valid.',
                ],
                "photo" => [
                    'uploaded' => 'Please upload an image.',
                    'mime_in' => 'The uploaded file is not a valid Image. Allowed types are jpg and jpeg',
                    'max_size' => 'The image size should not exceed 2MB.'
                ]
            ];

            // Validate each document file
            $documentFiles = $uploadedFiles['documents'] ?? [];
            foreach($documentFiles as $index => $documentFile) {
                $rules["documents.{$index}"] = "uploaded[documents.{$index}]|mime_in[documents.{$index},application/pdf]|max_size[documents.{$index},2048]";
                $errors["documents.{$index}"] = [
                    'uploaded' => 'Please upload a document.',
                    'mime_in' => 'The uploaded document is not valid. Only PDF files are allowed.',
                    'max_size' => 'The document size should not exceed 2MB.'
                ];
            }

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
                if($result){
                    $member_id = (int) $result;

                    // Check if the files are uploaded and iterate over them
                    if($documentFiles) {
                        // Handle the case where multiple files are uploaded under the same name
                        if(is_array($documentFiles)) {
                            foreach($documentFiles as $file) {
                                if(is_array($file)){
                                    foreach($file as $f) {
                                        $this->processDocumentFile($f, $member_id);
                                    }
                                } else {
                                    $this->processDocumentFile($file, $member_id);
                                }
                            }
                        } else {
                            // Handle a single file
                            $this->processDocumentFile($documentFiles, $member_id);
                        }
                    } else {
                        echo "No files were uploaded.";
                    }
                } else {
                    return "Something went wrong";
                }

                return redirect()->to('member-table/');
            } else {
                $data['validation'] = $validation;
                return view('admin/forms/Member_form', $data);
            }
        } else {
            return "Something went wrong, please try to contact Mayank";
        }
    }

    public function processDocumentFile(UploadedFile $file, int $member_id) {
        if($file->isValid() && !$file->hasMoved()) {
            $this->documentModel = new DocumentModel();

            // Get the file contents
            $documentData = file_get_contents($file->getTempName());

            // Save the file contents to the database
            $this->documentModel->save([
                'document_data' => $documentData,
                'document_name' => $file->getClientName(),
                'member_id' => $member_id
            ]);
        } else {
            echo "Something went wrong";
        }
    }

    public function delete(int $member_id) 
    {
        return var_dump($member_id);
    }
}
