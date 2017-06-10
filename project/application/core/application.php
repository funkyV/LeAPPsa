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
        } elseif (file_exists(APP . 'controllers/' . $this->url_controller . '.php')) {

            require APP . 'controllers/' . $this->url_controller . '.php';

            $this->url_controller = new $this->url_controller();
            if (method_exists($this->url_controller, $this->url_action)) {
                if(!empty($this->url_params)) {
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                if(strlen($this->url_action) == 0) {
                    $this->url_controller->index();
                }
                else {
                    echo "5"; //testez sa vad pe ce ramura if se duce in functie de parametri
                    die();
                    exit;
                    require APP . 'controllers/error.php';
                    $page = new Errur();
                    $page->index();
                }
            }
        } else {
            echo $this->url_controller. ' / ' . "2";//testez sa vad pe ce ramura if se duce in functie de parametri
                    die();
                    exit;
            require APP . 'controllers/error.php';
            $page = new Errur();
            $page->index();
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
        // echo 'Action: ' . $this->url_action . '<br>';
        // echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';
    }
}