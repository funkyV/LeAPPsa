<?php

/**
 * Created by PhpStorm.
 * User: funkyV
 * Date: 17/06/2017
 * Time: 06:32
 */
class Answer extends Model {
    function __construct($db) {
        parent:: __construct($db);
    }
    public function addAnswer($parameters) {
//        id	answer	date	question_id	user_id

        $sql = "INSERT INTO answers (id, answer, date, question_id, user_id)
                VALUES (null, :answer, :aDate, :questionID, :userID)";
//        var_dump($sql);
//        var_dump($parameters);
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    public function getAnswerForQuestion($questionId, $userId) {
        $sql = "SELECT * FROM answers 
                WHERE  answers.question_id = :questionID 
                AND answers.user_id = :userID";

        $parameters = array(':questionID' => $questionId, ':userID' => $userId);

        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}