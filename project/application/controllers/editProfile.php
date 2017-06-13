<?php

class editProfile extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/editprofile.php';
        require FOOTER;
    }
    public function process() {
    if(isset($_POST['edit_submit'])){
        if(isset($_POST["username"])){
            if($this->user->updateDetails($_SESSION['user_session'], 'username', $_POST["username"])){
                $this->user->redirect(profil);
            }
        }
        if(isset($_POST["firstname"])){
            if($this->user->updateDetails($_SESSION['user_session'], 'firstname', $_POST["firstname"])){
                $this->user->redirect(profil);
            }
        }
        if(isset($_POST["lastname"])){
            if($this->user->updateDetails($_SESSION['user_session'], 'lastname', $_POST["lastname"])){
                $this->user->redirect(profil);
            }
        }
        if(isset($_POST["email"])){
            if($this->user->updateDetails($_SESSION['user_session'], 'email', $_POST["email"])){
                $this->user->redirect(profil);
            }
        }      
        if(isset($_POST["avatar"])){
            if($this->user->updateDetails($_SESSION['user_session'], 'profile_pic', $_POST["avatar"])){
                $this->user->redirect(profil);
            }
        }      
    }else{
        echo "Macar un camp este obligatoriu!";
        }        
    }
}