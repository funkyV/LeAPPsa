<?php

class login extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/login.php';
        require FOOTER;
    }
    public function process() {
        if($this->user->is_loggedin()!=""){
             $this->user->redirect('home');
        }

        if(isset($_POST['login_submit']))
        {
            $uname = $_POST['username'];
            $umail = $_POST['email'];
            $upass = $_POST['password'];
            
            if($this->user->login($uname,$umail,$upass)){
                $this->user->redirect('homeloged');
            }
            else{
                echo "Wrong Details !";
            } 
        }
}