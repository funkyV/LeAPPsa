<?php

class Application{
    private $url_controller = null;
    private $url_action = null;
    private $url_params = array();

    public function __construct()
    {//testez rootarea
        $this->getUrlWithoutModRewrite();
        if (!$this->url_controller) {
            require APP . 'controllers/home.php';
            $page = new Home();
            $page->index();
        } else{
            require APP . 'views/index.php';
        }
    }
    private function getUrlWithoutModRewrite()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $url = array_diff($url, array('', 'index.php'));
        $url = array_values($url);
        if (defined('URL_SUB_FOLDER') && !empty($url[0]) && $url[0] === URL_SUB_FOLDER) {
            unset($url[0]);
            $url = array_values($url);
        }
        $this->url_controller = isset($url[0]) ? $url[0] : null;
        $this->url_action = isset($url[1]) ? $url[1] : null;
        unset($url[0], $url[1]);
        $this->url_params = array_values($url);

        // echo 'Controller: ' . $this->url_controller . '<br>';

    }
}