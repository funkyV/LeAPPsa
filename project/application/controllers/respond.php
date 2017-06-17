<?php


class respond extends Controller {
    public $questionList = null;
    public $answeredQuestion = null;
    public $selectedQuestion = null;

    public function __construct() {
        parent:: __construct();
        $this->questionList = $this->getQuestions();
    }

    function getQuestions() {
        $sql = "SELECT questions FROM notification where receiver_id = ".$_SESSION['user_session']."";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public function respondQuestion() {
        if ($this->get_request_method() != "POST") {
            $this->response(' {"message" : "this is a post action"}', 400);
        } else {

            require APP . '/model/question.php';

            $userId = $_SESSION['user_session'];
            $this->selectedQuestion = $_POST["questionSelected"];

            $this->answeredQuestion = $_POST["answeredQuestion"];
            $params =  array(':user_id' => $userId, ':question_id' => $this->answeredQuestion);

            $question = new Question($this->db);
            //respond to the question
            $question->addResponse($params);
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
                $questionUrl = 'http://' . $_SERVER["HTTP_HOST"] . '/question/' . $lastQuestionId;
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