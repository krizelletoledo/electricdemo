<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::login');

// Public Puihaha Electric website pages
$routes->get('/home', 'Website::index');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index');
$routes->match(['get', 'post'], '/contact', 'Contact::index');
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::create');


// route for login page
$routes->get('/login', 'Home::login');
$routes->post('/login', 'Home::login');

// route for dashboard page
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/account/create', 'Home::create');
$routes->post('/account/create', 'Home::create');
$routes->get('/account/(:num)', 'Home::viewAccount/$1');
$routes->get('/account/(:num)/edit', 'Home::edit/$1');
$routes->post('/account/(:num)/edit', 'Home::edit/$1');
$routes->post('/account/(:num)/delete', 'Home::delete/$1');


// route for logout
$routes->post('/logout', 'Home::logout');
