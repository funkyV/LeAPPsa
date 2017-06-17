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

    function getEmails() {
        $sql = "SELECT email FROM users";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public function askQuestion() {
        if ($this->get_request_method() != "POST") {
            $this->response(' {"message" : "this is a post action"}', 400);
        } else {

            require APP . '/model/question.php';
            //$_SESSION['user_id'] = 12;

            $userId = $_SESSION['user_session'];
            $questionType = $_POST["question_types"];
            $this->selectedEmails = $_POST["emails"];

            $this->askedQuestion = $_POST["question"];
            $params =  array(':question' => $this->askedQuestion, ':user_id' => $userId, ':aDate' => date('Y-m-d H:i:s'));

            $question = new Question($this->db);
            //add the question
            $question->addQuestion($params);
            $lastQuestionId = $this->db->lastInsertId();

            //get recipient ids
            $sql = 'SELECT id FROM users WHERE email in '. $this->stringFromArray($this->selectedEmails);

            $query = $this->db->prepare($sql);
            $query->execute($params);

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            //insert recipients
            $insertSql = 'INSERT INTO recipients (question_id, user_id) VALUES';

            foreach ($result as $aResult) {
                $insertSql = $insertSql . '(' . $lastQuestionId . ',' . $aResult["id"] .')';

                if ($aResult["id"] != end($result)["id"]) {
                    $insertSql = $insertSql . ',';
                }

            }

            $insertQuery = $this->db->prepare($insertSql);
            $insertQuery->execute();

            foreach ($this->selectedEmails as $aSelectedEmail) {
                $to = $aSelectedEmail;
                $subject = 'Ai primit LeAPPsa!';
                $questionUrl = 'http://' . $_SERVER["HTTP_HOST"] . '/answerQuestion/' . $lastQuestionId;
                $message = 'Ai primit leappsa de la ' . 'Mihai.' . "\r\n" . 'Raspunde-i accesand url-ul ' . $questionUrl;
                $message = $message . "\r\n" . 'Nu uita ca o poti da si tu mai departe, prietenilor tai!';
                $message = $message . "\r\n" . 'Bafta in viata, mei!';
                $headers = 'From: no-reply@leappsa.info.uaic.ro' . "\r\n".
                    'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);
            }



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

}