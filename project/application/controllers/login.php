<?php

class login extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/login.php';
        require FOOTER;
    }
    public function process() {
    //testing preluare date $_POST
        echo $_POST["email"];
        echo $_POST["password"];
        //echo $_GET["nume_param"];
    }
}