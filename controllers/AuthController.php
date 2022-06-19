<?php


namespace controllers;
use core\Application;
use core\Controller;
use core\Middlewares\AuthMiddleware;
use core\Request;
use core\Response;
use models\LoginForm;
use models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile','workouts']));
    }
    public function login(Request $request, Response $response){
        $loginForm = new LoginForm();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');
                //Application::$app->session->setFlash('success', 'You just earned a new badge');
                return 'ok';
            }
        }
        $this->setLayout('header');
        return Controller::render('login', [
            'model'=> $loginForm
        ]);
    }
    public function register(Request $request){

        $user = new User();
        if($request->isPost()){
            $user->loadData($request->getBody());

            if($user->validate() && $user->save())
            {
                $vkey = $user->getVkey();
                $email = $user->getEmail();
                $subject = "Email Verification";
                $message = "<a href='http://localhost:8080/verify_account?$vkey'>Register account </a>";
                $headers = "From: signatureproiecttw@gmail.com" . "\r\n";
                $headers .= "MIME-version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                mail($email,$subject,$message,$headers);

                Application::$app->response->redirect('/EmailConfirmation');
            }
            return Controller::render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('header');
        return Controller::render('register', [
            'model' => $user
        ]);
    }

    public function verifyAccount(Request $request){
        $user = new User();
        $vkey = $request->getPathAfter();
        $user->update($vkey);

        Application::$app->response->redirect('/dashboard');
    }

    public function logout(Request $request,Response $response){
        Application::$app->logout();
        $response->redirect('/');
    }
}