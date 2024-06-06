<?php

namespace App\Controllers;

use App\Models\AmenitiesModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AmenitiesController extends BaseController
{

    public function __construct() {
        $this->amenitiesModel = new AmenitiesModel();
    }


    public function index()
    {
        return "mayank bhai work kr raha hain";
    }

    public function listAll()
    {
        $data = $this->amenitiesModel->findAll();
        return var_dump($data);
    }
}
