<?php


namespace controllers;

require_once __DIR__ . '/../core/Application.php';

use core\Application;
use core\Controller;
use core\exception\ServerErrorException;
use core\Middlewares\AuthMiddleware;
use core\Request;
use core\Response;
use models\AutographForm;
use models\WorkoutForm;
use PDOException;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['uploadAutograph']));
        $this->registerMiddleware(new AuthMiddleware(['getProfile']));
        $this->registerMiddleware(new AuthMiddleware(['getDashboard']));
        $this->registerMiddleware(new AuthMiddleware(['getMarketplace']));
        $this->registerMiddleware(new AuthMiddleware(['getCSV']));
        $this->registerMiddleware(new AuthMiddleware(['getRSS']));
        $this->registerMiddleware(new AuthMiddleware(['getNotifications']));

    }

    /**
     * @throws ServerErrorException
     */
    public function uploadAutograph(Request $request, Response $response)
    {
        $autographForm = new AutographForm();
        if($request->isPost()){
            $input_array=$request->getBody();
            $autographForm->loadData($input_array);
            if ($autographForm->validate()){
                //add uploaded image to local folder and db
                try{
                    $input_array['image']=$_FILES['photo']['name'];
                    $tmpFile = $_FILES['photo']['tmp_name'];
                    $newFile = 'uploaded_images/'.$_FILES['photo']['name'];
                    $result = move_uploaded_file($tmpFile, $newFile);
                    Application::$app->db->insert("autographs", $input_array);

                    $autograph_id = Application::$app->db->select('autographs',$input_array,'id')[0];
                    foreach ($input_array as $key=>$value) {
                        if(str_starts_with($key,'tags')){
                            try{
                                Application::$app->db->insert('tags',['name'=>$value]);
                            }catch (PDOException $e){
                                echo 'same tag already exists';
                            }

                            $tag_id = Application::$app->db->select('tags',['name'=>$value],'id')[0];
                            Application::$app->db->insert('autograph_tags',['autograph_id'=>$autograph_id,'tag_id'=>$tag_id]);
                        }

                    }
                    Application::$app->db->insert("user_autographs", ['user_id'=>Application::$app->session->get('user'), 'autograph_id'=>$autograph_id]);
                    $response->redirect("/autograph/$autograph_id");
                    return 'ok';
                }catch(Exception $e){
                throw new ServerErrorException();
            }

            }
        }
        $this->setLayout('header');
        return Controller::render('upload', [
            'model' => $autographForm
        ]);
    }
    public function getProfile(){
        return $this->render('user');
    }
    public function getDashboard(){
        return $this->render('dashboard');
    }
    public function getMarketplace(){
        return $this->render('market');
    }
    public function getCSV(){
        return $this->render('exportCSV');
    }
    public function getRSS(){
        return $this->render('exportRSS');
    }
    public function getNotifications(){
        return $this->render('notifications');
    }


}