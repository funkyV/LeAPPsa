<?php
class homeloged extends Controller
{
    public function index() {
        require HEADER;
        if($this->user->is_loggedin()){
            require APP . '/views/homeloged.php';
        }else{
            require APP . '/views/login.php';
        }
        require FOOTER;
    }
}