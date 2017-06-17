<?php

class notification extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/notification.php';
        require FOOTER;
    }
    
}