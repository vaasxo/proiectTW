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
        $this->registerMiddleware(new AuthMiddleware(['uploadAutograph']));

    }
    public function uploadAutograph(Request $request, Response $response)
    {
        $autographForm = new AutographForm();
        if($request->isPost()){
            $input_array=$request->getBody();
            $autographForm->loadData($input_array);
            if ($autographForm->validate()){
                //add uploaded image to local folder and db
                $input_array['image']=$_FILES['image']['name'];
                $tmpFile = $_FILES['image']['tmp_name'];
                $newFile = 'uploaded_images/'.$_FILES['image']['name'];
                $result = move_uploaded_file($tmpFile, $newFile);

                Application::$app->db->insert("autographs", $input_array);
                $autograph_id = Application::$app->db->select('autographs',$input_array,'id');
                echo $autograph_id;
                Application::$app->db->insert("user_autographs", ['user_id'=>Application::$app->session->get('user'), 'autograph_id'=>$autograph_id]);
                $response->redirect("/autograph?id=$autograph_id");
                return 'ok';
            }
        }
        $this->setLayout('header');
        return Controller::render('upload', [
            'model' => $autographForm
        ]);
    }


}