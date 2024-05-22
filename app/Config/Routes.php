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
$routes->get('member-edit/(:num)', 'Member::update/$1');
$routes->get('member-view-by-id/(:num)', 'Member::viewById/$1');
