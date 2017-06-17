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
                    </div>
                </div>

                <div>

                    <div style="width:500px;margin:2px;float:left;">
                        <div style="width:300px;margin:0 auto;">
                            <h3>Statisticile mele</h3>
                            <label>Intrebari puse : <?php echo $this->user->lastEntry('username','users')?></label>
                            <br/>
                            <label>Raspunsuri date : <?php echo $this->user->lastQuestion()?></label>
                            <br/>
                            <br/>
                            
                            <h3>Intrebari primite</h3>

                            <table>
                                <tr><h4 style="color: #444;">#1. Aceasta este o intrebare
                                    <label class="user-started" id="user">utilizator</label>
                                </h4>
                                    
                                </tr>
                                <div class="separator"></div>
                                <tr id="row"><h4>#1. Aceasta este o intrebare</h4>
                                    <label class="user-started" id="user">adresata de catre utilizator</label>
                                </tr>
                            </table>
                            <?php
                            $results = $this->user->getAllDetailsByTable($this->$_SESSION['user_session']);
                             var_dump($results);
                             var_dump($_SESSION['user_session']);
                                foreach($results as $data) {
                                    echo '<tr><h4 style="color: #444;">' . htmlspecialchars($data['question']) . '</tr>';
                                }
                                
                            ?>

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
