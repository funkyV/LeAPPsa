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
                        <label>Ultimul membru inregistrat : <?php echo $this->user->lastEntry('username','users')?></label>
                        <br/>
                        <label>Ultima intrebare : #<?php echo $this->user->lastQuestion()?> : <?php echo $this->user->getDetailsByTable($this->user->lastQuestion(), 'question', 'questions')?></label>
                        <br/>
                    </div>
                </div>

                <div>

                    <div style="width:500px;margin:2px;float:left;">
                        <div style="width:300px;margin:0 auto;">
                            <h3>Statisticile mele</h3>
                            <label>Intrebari puse : <?php echo $this->user->getUserNrQuestions($_SESSION['user_session'])?></label>
                            <br/>
                            <label>Raspunsuri date : <?php echo $this->user->getUserNrAnswers($_SESSION['user_session'])?></label>
                            <br/>
                            <br/>
                            
                            <h3>Intrebari primite</h3>

                            <table>
                                <?php
                                $this->user->questionsSentToUser($_SESSION['user_session']);
                                ?>
                            </table>
                            

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
