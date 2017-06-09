<?php

class Controller {
    public $db = null;
    public $model = null;

    function __construct() {
        $this->openDatabaseConnection();
        // $this->loadModel();
    }

    private function openDatabaseConnection() {
    }
   
    public function loadModel()
    {
        //testing
        // require APP . '/model/model.php';
        // $this->model = new Model($this->db);
    }
}