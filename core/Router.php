<?php

namespace core;
use core\exception\ForbiddenException;
use core\exception\NotFoundException;
use core\exception\ServerErrorException;
use core\Middlewares\AuthMiddleware;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * Router constructor.
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->response = $response;
        $this->request = $request;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;

    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * @throws NotFoundException
     * @throws ForbiddenException
     * @throws ServerErrorException
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;


        $autograph_id =substr($path, strpos($path,'/autograph/')+strlen('/autograph/'));
        if(is_numeric($autograph_id)){
            if (Application::$app->db->select('autographs',['id'=>$autograph_id],'*')!=null){
                if(Application::isGuest())
                    throw new ForbiddenException();
                return Application::$app->view->renderView('autograph');
            }
            else
                throw new NotFoundException();
        }

        if ($callback === false)
        {
            throw new NotFoundException();
        }
        if (is_string($callback))
        {
                return Application::$app->view->renderView($callback);
        }
        if(is_array($callback))
        {
            /** @var Controller $controller */
            $controller=new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0]=$controller;

            foreach($controller->getMiddlewares() as $middleware){
                $middleware->execute();
            }
        }
        return call_user_func($callback,$this->request, $this->response);
    }

}