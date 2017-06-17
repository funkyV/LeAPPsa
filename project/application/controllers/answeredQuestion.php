<?php
/**
 * Created by PhpStorm.
 * User: funkyV
 * Date: 17/06/2017
 * Time: 07:30
 */
class AnsweredQuestion extends Controller {
    public $question = null;
    public $emailAndUsernameList = null;

    public function index() {
        require HEADER;
        require APP . '/views/answeredQuestion.php';
        require FOOTER;
    }

    public function id($questionId) {
        //        var_dump($id);
        $this->getQuestionWithId($questionId);
        $this->emailAndUsernameList = $this->getEmailsAndUsernames();
        $this->index();
    }

    private function getQuestionWithId($id) {
        require APP . '/model/question.php';
        $questionModel = new Question($this->db);
        $this->question = $questionModel->getQuestion($id)[0];
    }

    public function getEmailsAndUsernames() {

//        $user = new USER($this->db);
//
//        return $user->getUserEmailsAndUsernames();

        $sql = "SELECT email, username FROM users WHERE id NOT IN (";
        $sql = $sql . "SELECT receiver_id FROM recipients WHERE question_id = " . $this->question['id'] . ")";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

//        var_dump($result);
        return $result;
    }

    public function share($questionId) {
//        var_dump($_POST);
//        var_dump($questionId);

        $userId = $_SESSION['user_session'];
//            $questionType = $_POST["question_types"];
        $selectedEmails = $_POST["emails"];
//            //get recipient ids
        $userModel = new USER($this->db);
        $recipients= $userModel->getQuestionRecipientsForEmails($this->stringFromArray($selectedEmails));

        //insert recipients
//
        require APP . '/model/recipient.php';
        $recipientModel = new Recipient($this->db);
        $recipientModel->insertShareRecipients($recipients, $questionId);
//
//        $this->notifyRecipients($this->selectedEmails, $lastQuestionId);
//
//        require HEADER;
//        require APP . '/views/askSuccess.php';
//        require FOOTER;
        echo '<script type="text/javascript">';
        echo 'alert("Ai dat LeAPPsa mai departe! Nu uita ca poti epuiza lista cu jucatori!");';
        echo 'window.location.href ="' . URL_PROTOCOL . URL_DOMAIN . '/ask' . "\";";
        echo '</script>';
    }

    function stringFromArray($array) {
        $string = '(';
        foreach ($array as $element) {
            $string = $string . '\'' . $element . '\'';

            if ($element != end($array)) {
                $string = $string . ', ';
            }
        }

        $string = $string . ')';
        return $string;
    }


}
