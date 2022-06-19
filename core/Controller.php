<?php


namespace core;


use core\Middlewares\BaseMiddleware;

class Controller
{
    public string $layout='header';
    public string $action = '';
    /**
     * @var BaseMiddleware[]
     */
    protected array $middlewares=[];

    public function setLayout($layout){
        $this->layout=$layout;
    }
    public static function render($view,$params=[]){
        return Application::$app->view->renderView($view,$params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {

        $this->middlewares[]=$middleware;
    }

    /**
     * @return BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

}