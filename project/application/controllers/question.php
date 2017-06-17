<?php
/**
 * Created by PhpStorm.
 * User: funkyV
 * Date: 10/06/2017
 * Time: 15:30
 */

class Question extends Controller {
    public function index() {
        require HEADER;
        require APP . '/views/question.php';
        require FOOTER;
    }

    public function id($questionId) {
        var_dump($questionId);
    }




}
