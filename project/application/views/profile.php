<!DOCTYPE HTML>
<html>
    <head>
        <title>Profile</title>
    </head>
    <body>
      <div id="site_content">
        <div id="content" style="font-size:16px;">
          <div style="width:170px;margin:2px;float:left;">
            <img src="../public/style/default.png" alt="" width="100" style="border-radius:50%;margin-left:35px;border:1px solid #323232">
            <div style="border:1px solid #323232; margin:5px;min-height:100px;">
              STATISTICI
              <p>combo <br />
               longest streak <br />
                most answered question</p>
            </div>
          </div>
          <div style="width:370px;margin:2px;float:left;">
            Username : <strong><u><?php echo ucfirst($this->user->getDetails($_SESSION['user_session'],'username'));?></u></strong><br/>
            Nume : <strong><u><?php echo ucfirst($this->user->getDetails($_SESSION['user_session'],'firstname'));?></u></strong><br/>
            Prenume : <strong><u><?php echo ucfirst($this->user->getDetails($_SESSION['user_session'],'lastname'));?></u></strong><br/>
            Email : <strong><u><?php echo $this->user->getDetails($_SESSION['user_session'],'email');?></u></strong><br/>
            <a href="editprofile"><input type="submit" value="Edit Profile"></a>
          </div>
          <!--<div style="width:270px;margin:2px;float:left;">
              
          </div>      -->
        </div>
      </div>
    </body>
</html>
