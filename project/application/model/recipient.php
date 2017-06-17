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
//        question_id	sender_id	receiver_id	depth

        $insertSql = 'INSERT INTO recipients (question_id, sender_id, receiver_id, depth) VALUES ';
//        var_dump($recipients);
        $sender = $_SESSION['user_session'];

//        $checkResults = $this->checkForDouble($sender,$questionId);
//        var_dump($checkResults);
//        var_dump(is_null($checkResults) &&  empty($checkResults));
//        if (is_null($checkResults) &&  empty($checkResults)) {
            $senderToSender = '(' . $questionId . ',' . $sender .',' . $sender . ',' . 0 .')';

            $insertSql = $insertSql . $senderToSender . ',';
//        }
        foreach ($recipients as $aRecipient) {
            //sender sender
            //receiver receiver
            //sender receiver

            $receiver = $aRecipient["id"];

//            var_dump($sender);
//            var_dump($receiver);


            $receiverToReceiver = '(' . $questionId . ',' . $receiver .',' . $receiver . ',' . 0 .')';
            $senderToReceiver = '(' . $questionId . ',' . $sender .',' . $receiver . ',' . 1 . ')';

//            $insertSql = $insertSql . '(' . $questionId . ',' . $_SESSION['user_session'] .',' . $aRecipient["id"] . ')';

            $insertSql = $insertSql  . $receiverToReceiver;
            $insertSql = $insertSql . ',' . $senderToReceiver;

            if ($aRecipient["id"] != end($recipients)["id"]) {
                $insertSql = $insertSql . ',';
            }
        }
//        var_dump($insertSql);
        $insertQuery = $this->db->prepare($insertSql);
        $insertQuery->execute();
    }

    public function insertShareRecipients($recipients, $questionId) {
        //        question_id	sender_id	receiver_id	depth

        $insertSql = 'INSERT INTO recipients (question_id, sender_id, receiver_id, depth) VALUES ';
//        var_dump($recipients);
        $sender = $_SESSION['user_session'];

        foreach ($recipients as $aRecipient) {
            //sender sender
            //receiver receiver
            //sender receiver

            $receiver = $aRecipient["id"];

//            var_dump($sender);
//            var_dump($receiver);

            $depth = $this->getDepthOfSender($sender, $questionId)[0];
//            var_dump($depth["MAX(depth)"] + 1);
            $receiverToReceiver = '(' . $questionId . ',' . $receiver .',' . $receiver . ',' . 0 .')';
            $senderToReceiver = '(' . $questionId . ',' . $sender .',' . $receiver . ',' . ($depth["MAX(depth)"] + 1) . ')';

//            $insertSql = $insertSql . '(' . $questionId . ',' . $_SESSION['user_session'] .',' . $aRecipient["id"] . ')';

            $insertSql = $insertSql  . $receiverToReceiver;
            $insertSql = $insertSql . ',' . $senderToReceiver;

            if ($aRecipient["id"] != end($recipients)["id"]) {
                $insertSql = $insertSql . ',';
            }
        }
//        var_dump($insertSql);
        $insertQuery = $this->db->prepare($insertSql);
        $insertQuery->execute();
    }

    public function getDepthOfSender($sender, $questionId) {
        $sql = "SELECT MAX(depth) FROM recipients WHERE receiver_id = " . $sender;
        $sql = $sql . " AND question_id = " . $questionId;

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

//    public function checkForDouble($recipientId, $questionId) {
//        $sql = "SELECT * FROM recipients WHERE sender_id = " . $recipientId . " AND receiver_id = " .$recipientId;
//        $sql = $sql . " AND question_id = " . $questionId;
//
//        $query = $this->db->prepare($sql);
//        $query->execute();
//
//        return $query->fetchAll(PDO::FETCH_ASSOC);
//    }

}