<?php

/**
 * Created by PhpStorm.
 * User: funkyV
 * Date: 17/06/2017
 * Time: 05:20
 */
class Recipient extends Model {
    function __construct($db) {
        parent:: __construct($db);
    }

    public function insertRecipients($recipients, $questionId) {
        $insertSql = 'INSERT INTO recipients (question_id, user_id) VALUES';

        foreach ($recipients as $aRecipient) {
            $insertSql = $insertSql . '(' . $questionId . ',' . $aRecipient["id"] . ')';

            if ($aRecipient["id"] != end($recipients)["id"]) {
                $insertSql = $insertSql . ',';
            }
        }

        $insertQuery = $this->db->prepare($insertSql);
        $insertQuery->execute();
    }

}