<?php


class Ask extends Controller {
    public $emailList = null;
    public $askedQuestion = null;
    public $selectedEmails = null;

    public function __construct() {
        parent:: __construct();
        $this->emailList = $this->getEmails();
    }

    public function index() {
        require HEADER;
        require APP . '/views/ask.php';
        require FOOTER;
    }

    public function getEmails() {
//        $sql = "SELECT email FROM users";
//
//        $query = $this->db->prepare($sql);
//        $query->execute();
//
//        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $user = new USER($this->db);

        return $user->getUserEmails();
    }

    public function askQuestion()
    {
        if ($this->get_request_method() != "POST") {
            $this->response(' {"message" : "this is a post action"}', 400);
        } else {
            require APP . '/model/question.php';


            //prepare question parameters
            $userId = $_SESSION['user_session'];
            $questionType = $_POST["question_types"];
            $this->selectedEmails = $_POST["emails"];
            $this->askedQuestion = $_POST["question"];
            $params = array(':question' => $this->askedQuestion, ':user_id' => $userId, ':aDate' => date('Y-m-d H:i:s'));

            //add the question
            $question = new Question($this->db);
            $question->addQuestion($params);
            $lastQuestionId = $question->lastQuestionId();

//            //get recipient ids
            $userModel = new USER($this->db);
            $recipients= $userModel->getQuestionRecipientsForEmails($this->stringFromArray($this->selectedEmails));

            //insert recipients

            require APP . '/model/recipient.php';
            $recipientModel = new Recipient($this->db);
            $recipientModel->insertRecipients($recipients, $lastQuestionId);

            $this->notifyRecipients($this->selectedEmails, $lastQuestionId);

            require HEADER;
            require APP . '/views/askSuccess.php';
            require FOOTER;
        }
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

    function notifyRecipients($emails, $questionId) {
        foreach ($emails as $aSelectedEmail) {
            $to = $aSelectedEmail;
            $subject = 'Ai primit LeAPPsa!';
            $questionUrl = 'http://' . $_SERVER["HTTP_HOST"] . '/question/' . $questionId;
            $message = 'Ai primit leappsa de la ' . 'Mihai.' . "\r\n" . 'Raspunde-i accesand url-ul ' . $questionUrl;
            $message = $message . "\r\n" . 'Nu uita ca o poti da si tu mai departe, prietenilor tai!';
            $message = $message . "\r\n" . 'Bafta in viata, mei!';
            $headers = 'From: no-reply@leappsa.info.uaic.ro' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            echo ('notified user with email ' . $to );
            echo ("\r\n");
//            mail($to, $subject, $message, $headers);
        }
    }


}