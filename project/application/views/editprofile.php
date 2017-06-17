
<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit Profile</title>
    </head>
    <body>
      <div id="site_content">
        <div id="content" style="font-size:16px;">
          <div style="width:370px;margin:2px;float:left;">
            <form action="editProfile/process" method="post" style="width:300px;margin:0 auto;" enctype="multipart/form-data"> 
              <label for="username">Username:</label>
              <input type="text" id="username" name="username">
              <br/>
              <label for="firstname">Firstname:</label>
              <input type="text" id="firstname" name="firstname">
              <br/>
              <label for="lastname">Lastname:</label>
              <input type="text" id="lastname" name="lastname">
              <br/>
              <label for="email">Email:</label>
              <input type="email" id="email" name="email">
              <br/>
              <input type="submit" name="edit_submit" value="Update">
            </form>
          </div>
          <div style="width:270px;margin:2px;float:left;">
          </div>      
        </div>
      </div>
    </body>
</html>
