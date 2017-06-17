<?php
/**
 * Created by PhpStorm.
 * User: funkyV
 * Date: 17/06/2017
 * Time: 07:27
 */
?>

<div id="site_content">

    <div id="content">
        <h1 class = "center"><?php echo ($this->question['question']);?></h1>

        <h4 class = "center">Felicitari pentru raspuns!<br/> Acum poti da LeAPPsa mai departe.</h4>

<ul class = "center" style = "list-style-type:none;">
    <?php
//    var_dump($this);
//    foreach ($this->selectedEmails as $anEmail){
//        echo '<li>' . $anEmail . '</li>';
//    }
    ?>
    <form action="/answeredQuestion/share/<?php echo ($this->question['id'])?>" method="POST" class="center" style="width:400px;margin:0 auto;">
        <br/>
        <label name = "question"> Lista cu utilizatori "liberi"</label>
        <br/>
        <br/>
        <select style="width:200px; height:100px; text-align:center" name="emails[]" multiple>
            <?php foreach ($this->emailAndUsernameList as $emailAndUsername) {
                echo '<option value="' . $emailAndUsername['email'] . '">' . $emailAndUsername['username'] . '</option>';
            }
            ?>
        </select>
        <br/>
        <br/>
        <input type="submit" value="Da LeAPPsa mai departe" style="width:150px">
    </form>
</ul>
</div>
</div>