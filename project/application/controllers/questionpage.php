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
    public $treeData = null;


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
//        var_dump( $anAnswer);
//        var_dump(!is_null($anAnswer) && array_count_values($anAnswer) == 0);
        if (!is_null($anAnswer) &&  !empty($anAnswer)) {
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

    public function showTree($questionId) {
        $sql = "select sender_id as parent, id as child, depth
                from users 
                JOIN (
                        select sender_id, receiver_id, depth, question_id
                        from recipients
                        where depth > 0
                    ) as stm
                on users.id = stm.receiver_id
                where question_id = " . $questionId;
        $sql = $sql . " order by depth";

        $query = $this->db->prepare($sql);
        $query->execute();

        $this->treeData = $query->fetchAll(PDO::FETCH_ASSOC);

//        echo '<pre>' . var_export($treeData, true) . '</pre>';
//        var_dump();
//        foreach ($this->treeData as $aNode) {
//            echo '<pre>' . var_export($aNode, true) . '</pre>';
//        }

//        require HEADER;
        require APP . '/views/tree.php';
//        require
    }





}
