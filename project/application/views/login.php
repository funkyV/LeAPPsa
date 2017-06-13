<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
      <div id="site_content">
        <div id="content">
          <form form action="login/process" method="POST" style="width:300px;margin:0 auto;">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <br/>
            <label for="email">Email*:</label>
            <input type="email" id="email" name="email">
            <br/>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <br/>
            <a href="register">Nu ai cont? Inregistreaza-te!</a><br/>
            <input type="submit" name="login_submit" value="Login">
          </form>
        </div>
      </div>
    </body>
</html>