<?php

namespace core;

use models\Autograph;
use models\User;

class Application
{
    public string $layout = 'header';
    public User $userClass;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public static Application $app;
    public Session $session;
    public Controller $controller;
    public ?DBModel $user;
    public ?Autograph $autographClass;
    public View $view;

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function __construct($rootPath)
    {
        $this->userClass = new User();
        $this->autographClass = new Autograph();

        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->controller = new Controller();
        $this->session = new Session();
        $this->view=new View();

        $this->db = new Database();
        $primaryValue = $this->session->get('user');
        if($primaryValue){
            $primaryKey = $this->userClass->getPrimaryKey();
            $this->user = $this->userClass->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function run()
    {
        try{
            echo $this->router->resolve();
        }catch(\Exception $e){
            $this->response->setStatusCode(500);
            echo $this->view->renderView('_error', [
                'exception'=>$e
            ]);
        }
    }

    public function login(DBModel $user): bool
    {
        $this->user = $user;
        $primaryKey = $user->getPrimaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest(): bool
    {
        return !self::$app->user;
    }
}