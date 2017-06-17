<?php
// require APP . '/model/model.php';

class Question extends Model {
    function __construct($db) {
        parent:: __construct($db);
    }
    public function addQuestion($parameters) {
        // id	question	user_id	date	max_invites	invites

        $sql = "INSERT INTO questions (id, question, user_id, date, max_invites, invites)
                VALUES (null, :question, :user_id, :aDate, 15, 12)";
        
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    public function addResponse($parameters) {
        // receiver_id	question_id

        $sql = "INSERT INTO notifications (receiver_id, question_id)
                VALUES (:user_id, :question_id)";
        
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    public function lastQuestionId() {
        return $this->db->lastInsertId('questions');
    }

}