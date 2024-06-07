<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AmenitiesModel;
use App\Models\BedType;
use App\Models\RoomModel;
use App\Models\RoomTypesModel;
use App\Models\RoomViewModel;
use CodeIgniter\HTTP\ResponseInterface;

class RoomController extends BaseController
{


    public function __construct() {
        $this->room = new RoomModel();
        $this->roomType = new RoomTypesModel();
        $this->amenities = new AmenitiesModel();
        $this->bedType = new BedType();
        $this->roomView = new RoomViewModel();
    }


    public function index()
    {   
        return view('admin/forms/AddRoomForm');
    }


}
