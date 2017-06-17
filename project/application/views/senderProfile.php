<!DOCTYPE HTML>
<html>
    <head>
        <title>Profile</title>
    </head>
    <body>
      <div id="site_content">
        <div id="content" style="font-size:16px;">
          <div style="width:370px;margin:2px;float:left;">
          <?php $userId = $this->userId;?>
            Username : <strong><u><?php echo $this->user->getDetails($this->userId,'username');?></u></strong><br/>
            <!--Nume : <strong><u><?php echo ucfirst($this->user->getDetails($_SESSION['user_session'],'firstname'));?></u></strong><br/>
            Prenume : <strong><u><?php echo ucfirst($this->user->getDetails($_SESSION['user_session'],'lastname'));?></u></strong><br/>
            Email : <strong><u><?php echo $this->user->getDetails($_SESSION['user_session'],'email');?></u></strong><br/>-->
            </div>
        </div>
      </div>
    </body>
</html>
