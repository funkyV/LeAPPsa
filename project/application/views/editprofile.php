
<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit Profile</title>
    </head>
    <body>
      <div id="site_content">
        <div id="content" style="font-size:16px;">
          <div style="width:170px;margin:2px;float:left;">
            <img src="img/default.png" alt="" width="100" style="border-radius:50%;margin-left:35px;border:1px solid #323232">
          </div>
          <div style="width:370px;margin:2px;float:left;">
            <form action="methods/update_process.php" method="post" style="width:300px;margin:0 auto;" enctype="multipart/form-data"> 
              <label for="username">Username:</label>
              <input type="text" id="username" name="username">
              <br/>
              <label for="nume">Nume:</label>
              <input type="text" id="nume" name="nume">
              <br/>
              <label for="prenume">Prenume:</label>
              <input type="text" id="prenume" name="prenume">
              <br/>
              <label for="email">Email:</label><input type="email" id="email" name="email">
              <br/>
              <label for="avatar">Avatar:</label>
              <input type="file" id="avatar" name="avatar">
              <br/>
              <input type="submit" value="Update">
            </form>
          </div>
          <div style="width:270px;margin:2px;float:left;">
          </div>      
        </div>
      </div>
    </body>
</html>
