<?php


namespace core;


class View
{

    public string $title='';
    public function renderView($view,$params=[])
    {
        $viewContent = $this->renderOnlyView($view,$params);
        if($view == 'search' || $view == 'send_notification'){
            return $viewContent;
        }
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->layout;
        if(Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }
        ob_start();
        include_once __DIR__."/../views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view,$params)
    {
        foreach($params as $key=>$value){
            $$key=$value;
        }

        ob_start();

        include_once __DIR__."/../views/$view.php";
        return ob_get_clean();
    }
}