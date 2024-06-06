<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RoomTypesModel;

class RoomTypeController extends BaseController
{   

    public function __construct() {
        $this->roomType = new RoomTypesModel();
    }

    public function index()
    {
        return "mayank bhai work kar raha hain";
    }

    public function listAll()
    {
        $data = $this->roomType->findAll();
        return var_dump($data);
    }
}
