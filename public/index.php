<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new core\Application(dirname(__DIR__));
$app->router->get('/', 'homepage');
$app->router->get('/homepage', 'homepage');
$app->router->get('/about_us', 'about_us');
$app->router->get('/contact', 'contact');
$app->router->get('/EmailConfirmation', 'email_confirmation');
$app->router->get('/faq', 'faq');
$app->router->get('/about-us', 'about_us');
$app->router->get('/reset_password', 'forgotPass');
$app->router->get('/pass_reset_confirmation', 'passResetConfirmation');
$app->router->get('/news', 'news');
$app->router->get('/exportCSV', 'exportCSV');
$app->router->get('/exportRSS', 'exportRSS');
$app->router->get('/search', 'search');
$app->router->get('/send_notification', 'send_notification');


$app->router->get('/verify_account', [controllers\AuthController::class,'verifyAccount']);
$app->router->get('/login', [controllers\AuthController::class,'login']);
$app->router->post('/login', [controllers\AuthController::class,'login']);
$app->router->get('/logout', [controllers\AuthController::class,'logout']);
$app->router->get('/register', [controllers\AuthController::class,'register']);
$app->router->post('/register', [controllers\AuthController::class,'register']);

$app->router->get('/upload', [controllers\SiteController::class,'uploadAutograph']);
$app->router->post('/upload', [controllers\SiteController::class,'uploadAutograph']);
$app->router->get('/user', [controllers\SiteController::class,'getProfile']);
$app->router->get('/dashboard', [controllers\SiteController::class,'getDashboard']);
$app->router->get('/market', [controllers\SiteController::class,'getMarketplace']);
$app->router->get('/notifications', [controllers\SiteController::class,'getNotifications']);




$app->run();