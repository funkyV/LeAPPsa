<?php

class Ask extends Controller {
    
    public function index() {
        require HEADER;
        require APP . '/views/ask.php';
        require FOOTER;
    }

    public function askQuestion() {

        if ($this->get_request_method() != "POST") {
            $this->response(' {"message" : "this is a post action"}', 400);
        } else {
            $this->response($_POST['question'], 200);
        }
    }
}