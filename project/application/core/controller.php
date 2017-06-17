<?php

class Controller extends REST {
    public $db = null;
    public $model = null;

    function __construct() {
        $this->openDatabaseConnection();
        $this->loadModel();
    }

    private function openDatabaseConnection() {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }
   
    public function loadModel()
    {
        //testing
        require APP . '/model/model.php';
        // creaza model si transmite conexiunea cu bd-u
        $this->model = new Model($this->db);
        
    }

    public function json($data) {
        if (is_array($data)) {
            return json_encode($data);
        }
    }

    public function messageArray($status, $message) {
        $messageArray = array ('status' => $status, 'message' => $message);
        return $messageArray;
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}