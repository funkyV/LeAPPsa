<?php

class statistic extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/statistic.php';
        require FOOTER;
    }
}