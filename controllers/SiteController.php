<?php


namespace controllers;

require_once __DIR__ . '/../core/Application.php';

use core\Application;
use core\Controller;
use core\Middlewares\AuthMiddleware;
use core\Request;
use core\Response;
use models\AutographForm;
use models\WorkoutForm;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['generateWorkout']));

    }
    public function uploadAutograph(Request $request, Response $response)
    {
        $autographForm = new AutographForm();
        if($request->isPost()){
            $autographForm->loadData($request->getBody());
            if ($autographForm->validate()){
                $response->redirect('/autograph');
                return 'ok';
            }
        }
        $this->setLayout('header');
        return Controller::render('upload', [
            'model' => $autographForm
        ]);
    }


}