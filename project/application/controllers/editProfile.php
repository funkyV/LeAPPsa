<?php

class editProfile extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/editprofile.php';
        require FOOTER;
    }
    public function process() {
    //testing preluare date $_POST
        echo $_POST["username"];
        echo $_POST["nume"];
        echo $_POST["prenume"];
        echo $_POST["email"];
        echo $_POST["avatar"];        
    }
}