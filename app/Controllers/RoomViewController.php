<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RoomViewModel;

class RoomViewController extends BaseController
{
    public function __construct() {
        $this->roomViewModel = new RoomViewModel();
    }


    public function index()
    {
        return "mayank bhai thora aur niche";
    }

    public function listAll()
    {
        $data = $this->roomViewModel->findAll();
        return var_dump($data); 
    }
}
