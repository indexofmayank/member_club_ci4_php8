<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('member-table/', 'Member::index');

$routes->get('add-member','Member::addMemberForm');
$routes->post('member/save', 'Member::save');
$routes->get('member/member-photo/(:num)', 'Member::showImage/$1');
$routes->get('member-delete/(:num)', 'Member::delete/$1');
$routes->get('member-edit/(:num)', 'Member::edit/$1');
$routes->get('member-view-by-id/(:num)', 'Member::viewById/$1');
$routes->get('member-document/(:num)', 'Member::documentById/$1');
$routes->post('member-update/(:num)', 'Member::update/$1');
$routes->get('member-image-test/(:num)', 'Member::showImage/$1');

//routes for room
$routes->get('rooms/',  'RoomController::index');

//routes for roomTypes
$routes->get('roomTypes/', 'RoomTypeController::listAll');

//routes for amenities
$routes->get('amenities/', 'AmenitiesController::listAll');

//routes for bedType
$routes->get('bedTypes/', 'BedTypeController::listAll');

//routes for roomView
$routes->get('roomView/', 'RoomViewController::listAll');