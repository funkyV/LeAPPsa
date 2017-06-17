<?php
class senderProfile extends Controller {

    

    public function index() {
        require HEADER;
        require APP . '/views/senderProfile.php';
        require FOOTER;
    }

}
