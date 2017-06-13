<?php

class logout extends Controller
{
    public function index() {
        $this->user->logout();
        require HEADER;
        require APP . '/views/logout.php';
        require FOOTER;
    }
    
}