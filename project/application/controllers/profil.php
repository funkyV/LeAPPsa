<?php

class profil extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/profil.php';
        require FOOTER;
    }
    
}