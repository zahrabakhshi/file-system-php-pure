<?php

class HomeController
{

    public function list()
    {
        echo 'hi';

//        return $this->renderView('/home/zahra/PhpstormProjects/file-sale/Views/home.php', ['test' => 123]);

    }

    public function renderView(string $path, array $params)
    {

        ob_start();

        include_once $path;

        $view = ob_get_clean();

        return $view;

    }
    
    public function get(){
    	echo 'h boy';
    }

}
