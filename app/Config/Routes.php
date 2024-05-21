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

