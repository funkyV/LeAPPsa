<?php

class profil extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/profile.php';
        require FOOTER;
    }
    
}