<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'db' => [
        'dsn' =>$_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];
$app = new core\Application(dirname(__DIR__), $config);
$app->router->get('/', 'homepage');
$app->router->get('/homepage', 'homepage');
$app->router->get('/about_us', 'about_us');
$app->router->get('/contact', 'contact');
$app->router->get('/EmailConfirmation', 'email_confirmation');
$app->router->get('/template', 'template');

$app->router->get('/logout', [controllers\AuthController::class,'logout']);


$app->router->get('/login', [controllers\AuthController::class,'login']);
$app->router->post('/login', [controllers\AuthController::class,'login']);
$app->router->get('/logout', [controllers\AuthController::class,'logout']);
$app->router->get('/register', [controllers\AuthController::class,'register']);
$app->router->post('/register', [controllers\AuthController::class,'register']);
$app->router->get('/upload', [controllers\SiteController::class,'uploadAutograph']);
$app->router->post('/upload', [controllers\SiteController::class,'uploadAutograph']);

$app->router->get('/user', 'user');

$app->router->get('/dashboard', 'dashboard');
$app->router->get('/faq', 'faq');
$app->router->get('/reset_password', 'forgotPass');
$app->router->get('/pass_reset_confirmation', 'passResetConfirmation');
$app->router->get('/market', 'market');
$app->router->get('/exportCSV', 'exportCSV');
$app->router->get('/exportRSS', 'exportRSS');
$app->router->get('/news', 'news');
$app->router->get('/notifications', 'notifications');
$app->router->get('/autograph', 'autograph');



$app->run();