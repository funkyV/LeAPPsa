<?php
class homeloged extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/homeloged.php';
        require FOOTER;
    }
}