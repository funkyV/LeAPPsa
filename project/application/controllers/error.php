<?php

class Errur extends Controller
{

    public function index()
    {
        require APP . 'views/_templates/header.php';
        require APP . 'views/error/error.php';
        require APP . 'views/_templates/footer.php';
    }
}