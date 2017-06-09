<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
      <div id="site_content">
      
        <div id="content">
          

                  <form action="methods/register_process.php" method="post" style="width:300px;margin:0 auto;">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                    <br/>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <br/>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <br/>
                    <label for="repassword">Repeat Password:</label>
                    <input type="password" id="repassword" name="repassword">
                    <br/>
                    <input type="submit" value="Register">
                  </form>
        </div>
      </div>
    </body>
</html>
