<?php

class About extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/about.php';
        require FOOTER;
    }
    
}