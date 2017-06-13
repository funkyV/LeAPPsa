<!DOCTYPE HTML>
<html>
<head>
    <title>LeAPPsa</title>
</head>
<body>
    <div id="site_content">

        <div id="content">
            <br/>
             <div>
                <div style="width:200px;margin:2px;float:left;">
                    <div style="width:300px;margin:0 auto;">
                        <h3>Statistici generale</h3>
                        <label>Membri : <?php echo $this->user->getNumOf('users')?></label>
                        <br/>
                        <label>Intrebari : <?php echo $this->user->getNumOf('questions')?></label>
                        <br/>
                        <label>Raspunsuri : <?php echo $this->user->getNumOf('answers')?></label>
                        <br/>
                        <label>Ultimul membru inregistrat : <?php echo $this->user->lastEntry('username','users')?></label>
                        <br/>
                        <label>Ultima intrebare : #<?php echo $this->user->lastQuestion()?> : <?php echo $this->user->getDetailsByTable($this->user->lastQuestion(), 'question', 'questions')?></label>
                        <br/>
                        <label>Ultimul raspuns : #438c</label>
                        <br/>
                    </div>
                </div>

                <div>

                    <div style="width:500px;margin:2px;float:left;">
                        <div style="width:300px;margin:0 auto;">
                            <h3>Intrebarile mele</h3>
                            <label>Ultimul membru inregistrat : <?php echo $this->user->lastEntry('username','users')?></label>
                            <br/>
                            <label>Ultima intrebare : <?php echo $this->user->lastQuestion()?></label>
                            <br/>
                            <br/>
                            

                            <form action="respond/respondQuestion" method="POST" class="center" style="width:400px;margin:0 auto;">
                            <h4>Intrebari de raspuns: </h4>
                            <br/>                           
                        
                            <select style="width:200px; height:100px; text-align:center" name="questionSelected" >
                            <?php foreach ($this->questionList as $question) {
                                echo '<option value="' . $question['question'] . '">' . $question['question'] . '</option>';
                        }
                        ?>
                </select>
                <br/>
                <label name = "question"> Raspunsul dumneavoastra: </label>
                            <br />
                            <input type="text" id="answeredQuestion" name="question">
                            <br/>
                <input type="submit" name="submit_respond" value="Trimite Raspuns" style="width:150px">
         </form>



                            <br/>
                            <br/>
                        </div>
                    </div>

                </div>

            </div>

         </div>
      </div>
</body>
</html>
