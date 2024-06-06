<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BedType;

class BedTypeController extends BaseController
{

    public function __construct() {
        $this->bedType = new BedType();
    }


    public function index()
    {
        return "working mayank bhai";
    }

    public function listAll() 
    {
        $data = $this->bedType->findAll();
        return var_dump($data);
    }
}
