<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public Routes
$routes->get('/', 'Home::index');

$routes->get('/deposits', 'DepositController::index');
$routes->get('/deposits/(:segment)', 'DepositController::show/$1');

$routes->get('/loans', 'LoanController::index');
$routes->get('/loans/(:segment)', 'LoanController::show/$1');

$routes->get('/branches', 'BranchController::index');

$routes->get('/contact', 'ContactController::index');
$routes->post('/contact', 'ContactController::submit');

$routes->get('/account-opening', 'AccountController::index');
$routes->post('/account-opening', 'AccountController::submit');

$routes->get('/page/(:segment)', 'PageController::show/$1');

// Admin Auth Routes (unprotected)
$routes->get('/admin/login', 'Admin\AuthController::login');
$routes->post('/admin/login', 'Admin\AuthController::authenticate');
$routes->get('/admin/logout', 'Admin\AuthController::logout');

// Admin Protected Routes
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index');
    $routes->get('dashboard', 'Admin\DashboardController::index');

    // Deposit Plans CRUD
    $routes->get('deposits', 'Admin\DepositAdminController::index');
    $routes->get('deposits/create', 'Admin\DepositAdminController::create');
    $routes->post('deposits/store', 'Admin\DepositAdminController::store');
    $routes->get('deposits/edit/(:num)', 'Admin\DepositAdminController::edit/$1');
    $routes->post('deposits/update/(:num)', 'Admin\DepositAdminController::update/$1');
    $routes->get('deposits/delete/(:num)', 'Admin\DepositAdminController::delete/$1');

    // Loan Products CRUD
    $routes->get('loans', 'Admin\LoanAdminController::index');
    $routes->get('loans/create', 'Admin\LoanAdminController::create');
    $routes->post('loans/store', 'Admin\LoanAdminController::store');
    $routes->get('loans/edit/(:num)', 'Admin\LoanAdminController::edit/$1');
    $routes->post('loans/update/(:num)', 'Admin\LoanAdminController::update/$1');
    $routes->get('loans/delete/(:num)', 'Admin\LoanAdminController::delete/$1');

    // Branches CRUD
    $routes->get('branches', 'Admin\BranchAdminController::index');
    $routes->get('branches/create', 'Admin\BranchAdminController::create');
    $routes->post('branches/store', 'Admin\BranchAdminController::store');
    $routes->get('branches/edit/(:num)', 'Admin\BranchAdminController::edit/$1');
    $routes->post('branches/update/(:num)', 'Admin\BranchAdminController::update/$1');
    $routes->get('branches/delete/(:num)', 'Admin\BranchAdminController::delete/$1');

    // Testimonials CRUD
    $routes->get('testimonials', 'Admin\TestimonialAdminController::index');
    $routes->get('testimonials/create', 'Admin\TestimonialAdminController::create');
    $routes->post('testimonials/store', 'Admin\TestimonialAdminController::store');
    $routes->get('testimonials/edit/(:num)', 'Admin\TestimonialAdminController::edit/$1');
    $routes->post('testimonials/update/(:num)', 'Admin\TestimonialAdminController::update/$1');
    $routes->get('testimonials/delete/(:num)', 'Admin\TestimonialAdminController::delete/$1');

    // Notices CRUD
    $routes->get('notices', 'Admin\NoticeAdminController::index');
    $routes->get('notices/create', 'Admin\NoticeAdminController::create');
    $routes->post('notices/store', 'Admin\NoticeAdminController::store');
    $routes->get('notices/edit/(:num)', 'Admin\NoticeAdminController::edit/$1');
    $routes->post('notices/update/(:num)', 'Admin\NoticeAdminController::update/$1');
    $routes->get('notices/delete/(:num)', 'Admin\NoticeAdminController::delete/$1');

    // Pages CRUD
    $routes->get('pages', 'Admin\PageAdminController::index');
    $routes->get('pages/edit/(:num)', 'Admin\PageAdminController::edit/$1');
    $routes->post('pages/update/(:num)', 'Admin\PageAdminController::update/$1');

    // Enquiries
    $routes->get('enquiries', 'Admin\EnquiryAdminController::index');
    $routes->get('enquiries/view/(:num)', 'Admin\EnquiryAdminController::view/$1');
    $routes->get('enquiries/delete/(:num)', 'Admin\EnquiryAdminController::delete/$1');

    // Hero Banners CRUD
    $routes->get('banners', 'Admin\BannerAdminController::index');
    $routes->get('banners/create', 'Admin\BannerAdminController::create');
    $routes->post('banners/store', 'Admin\BannerAdminController::store');
    $routes->get('banners/edit/(:num)', 'Admin\BannerAdminController::edit/$1');
    $routes->post('banners/update/(:num)', 'Admin\BannerAdminController::update/$1');
    $routes->get('banners/delete/(:num)', 'Admin\BannerAdminController::delete/$1');

    // Settings
    $routes->get('settings', 'Admin\SettingsController::index');
    $routes->post('settings/update', 'Admin\SettingsController::update');

    // Account Applications
    $routes->get('accounts', 'Admin\AccountApplicationAdminController::index');
    $routes->get('accounts/view/(:num)', 'Admin\AccountApplicationAdminController::view/$1');
    $routes->post('accounts/update-status/(:num)', 'Admin\AccountApplicationAdminController::updateStatus/$1');
    $routes->get('accounts/delete/(:num)', 'Admin\AccountApplicationAdminController::delete/$1');
});
