<div id="site_content">

    <div id="content">
        <h1 class = "center" style=""><?php echo $this->askedQuestion; ?></h1>

        <h3 class = "center"> Ai dat LeAPPsa catre:</h3>
<!--        <h4 class="center"> </h4>-->
        <ul class = "center emailList" style = "list-style-type:none;">
            <?php
                //var_dump($this->selectedEmails);
                foreach ($this->selectedEmails as $anEmail){
                    echo '<li>' . $anEmail . '</li>';
                }
            ?>
        </ul>
    </div>
</div>