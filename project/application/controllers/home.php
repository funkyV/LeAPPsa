<?php

class Home extends Controller
{

    public function index()
    {
        require APP . 'views/templates/header.php';
        require APP . 'views/home.php';
        require APP . 'views/templates/footer.php';
    }
}