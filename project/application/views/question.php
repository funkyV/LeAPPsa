<div id="site_content">

    <div id="content">
        <?php if (is_null($this->question)) {
            echo '<meta http-equiv="Refresh" content="0; url=/homeloged">';
        }?>

        <h1 class="center" style=""><?php echo($this->senderName)?> ti-a dat LeAPPsa!</h1>

        <h3 class="center"><?php echo $this->question['question']?> </h3>
        <br/>

        <?php if ($this->didAnswerQuestion == 1) {
            //s-a raspuns la intrebare
//            echo '<meta http-equiv="Refresh" content="0; url=/controller/answeredQuestion.php">';
            header('location: ' . URL_WITH_INDEX_FILE . 'answeredQuestion');
        }
        ?>


        <form action="/questionpage/answer/<?php echo $this->question['id']?>" method="POST" class="center" style="width:400px;margin:0 auto;">
            <label name = "answer"> Raspunde-i daca vrei sa dai LeAPPsa mai departe. </label>
            <br />
            <input type="text" id="answer" name="answer">
            <br/>


<!--            <select style="width:200px; height:100px; text-align:center" name="emails[]" multiple>-->
<!--                --><?php //foreach ($this->emailList as $email) {
//                    echo '<option value="' . $email['email'] . '">' . $email['email'] . '</option>';
//                }
//                ?>
<!--                <option value="volvo">Volvo</option>-->
<!--                <option value="saab">Saab</option>-->
<!--                <option value="opel">Opel</option>-->
<!--                <option value="audi">Audi</option>-->
<!--            </select>-->
            <br/>
            <input type="submit" value="Trimite" style="width:150px">
        </form>
    </div>
</div>
