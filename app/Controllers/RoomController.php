<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoomModel;
use CodeIgniter\HTTP\ResponseInterface;

class RoomController extends BaseController
{


    public function __construct() {
        $this->room = new RoomModel();
    }


    public function index()
    {   
        $data = $this->room->findAll();
        return var_dump($data);
    }


}
