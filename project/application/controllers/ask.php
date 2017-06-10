<?php


class Ask extends Controller {
    public $emailList = null;

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
            $_SESSION['user_id'] = 12;

            $userId = $_SESSION['user_id'];
            $questionType = $_POST["question_types"];
            $emails = $_POST["emails"];

            $params =  array(':question' => $_POST["question"], ':user_id' => $userId, ':aDate' => date('Y-m-d H:i:s'));

            $question = new Question($this->db);
            //add the question
            $question->addQuestion($params);
            $lastQuestionId = $this->db->lastInsertId();

            //get recipient ids
            $sql = 'SELECT id FROM users WHERE email in '. $this->stringFromArray($emails);

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