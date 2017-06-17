<?php
/**
 * Created by PhpStorm.
 * User: funkyV
 * Date: 17/06/2017
 * Time: 07:30
 */
class AnsweredQuestion extends Controller {
    public $question = null;

    public function index() {
        require HEADER;
        require APP . '/views/answeredQuestion.php';
        require FOOTER;
    }

    public function id($questionId) {
        //        var_dump($id);
        $this->getQuestionWithId($questionId);
        $this->index();
    }

    private function getQuestionWithId($id) {
        require APP . '/model/question.php';
        $questionModel = new Question($this->db);
        $this->question = $questionModel->getQuestion($id)[0];
    }

}
