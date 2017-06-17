<?php
/**
 * Created by PhpStorm.
 * User: funkyV
 * Date: 10/06/2017
 * Time: 15:30
 */

class QuestionPage extends Controller {

    public $question = null;
    public $senderName = null;
    public $didAnswerQuestion = null;
//    function __construct() {
//        parent::__construct();
//        $this->question = "dsa";
//        var_dump($this->question);
//    }
//
    public function index() {
        require HEADER;
        require APP . '/views/question.php';
        require FOOTER;
    }

    public function id($questionId) {
        $this->getQuestionWithId($questionId);

        require APP . '/model/answer.php';
        $answerModel = new Answer($this->db);

//        var_dump($this->question);
        $anAnswer = $answerModel->getAnswerForQuestion($this->question['id'], $_SESSION['user_session']);
        $this->didAnswerQuestion = 0;
//        var_dump($anAnswer);
        if (!is_null($anAnswer)) {
            $this->didAnswerQuestion = 1;
            header('location: ' . URL_PROTOCOL . URL_DOMAIN . '/answeredQuestion/id/' . $this->question['id']);
        } else {
            $userModel = new USER($this->db);
            $this->senderName = $userModel->getDetails($this->question['user_id'], 'username');

            $this->index();
        }
    }

    public function answer($questionId) {
//        var_dump($questionId);
        $this->getQuestionWithId($questionId);
//
        require APP . '/model/answer.php';
        $answerModel = new Answer($this->db);
        $theAnswer = $_POST['answer'];
        $currentUserId = $_SESSION['user_session'];
        //        id	answer	date	question_id	user_id
        $parameters =  array(':answer' => $theAnswer,':aDate' => date('Y-m-d H:i:s'), ':questionID' => $this->question['id'],
            ':userID' => $currentUserId);
        $answerModel->addAnswer($parameters);

//        echo (URL_PROTOCOL . URL_DOMAIN);
        header('location: ' . URL_PROTOCOL . URL_DOMAIN . '/answeredQuestion/id/' . $this->question['id']);
    }

    private function getQuestionWithId($id) {
        require APP . '/model/question.php';
        $questionModel = new Question($this->db);
        $this->question = $questionModel->getQuestion($id)[0];
    }





}