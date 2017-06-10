<?php

class register extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/register.php';
        require FOOTER;
    }
    public function process() {
    //testing preluare date $_POST
        echo $_POST["username"];
        echo $_POST["email"];
        echo $_POST["password"];
        echo $_POST["repassword"];
        
    }
}