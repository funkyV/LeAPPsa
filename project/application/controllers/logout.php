<?php

class logout extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/logout.php';
        require FOOTER;
    }
    
}