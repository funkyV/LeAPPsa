<!DOCTYPE HTML>
<html>
    <head>
      <title>LeAPPsa</title>
      <meta name="description" content="website description" />
      <meta name="keywords" content="website keywords, website keywords" />
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <link rel="stylesheet" type="text/css" href="/public/style/style.css" title="style" />
    </head>
<body>
    <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="/"><?php if (ucfirst(get_class($this))=="Homeloged"){
                                    ?>LeAPPsa<?php
                                }else
                                  echo ucfirst(get_class($this));?></a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <?php
          if($this->user->is_loggedin()!=""){?>
            <li class="selected"><a href="homeloged">Home</a></li>
            <li class="selected"><a href="about">About</a></li>
            <li class="selected"><a href="profil">Profile</a></li>
            <li class="selected"><a href="ask">Ask</a></li>
            <li class="selected"><a href="index">Statistics</a></li>
            <li class="selected"><a href="logout">Logout</a></li>
          <?php
         }else{?>
         <li class="selected"><a href="home">Home</a></li>
         <li class="selected"><a href="login">Login</a></li><?}?>
          
        </ul>
      </div>
    </div>
  </div>
</body>
</html>