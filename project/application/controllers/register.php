<?php

class register extends Controller
{
    public function index() {
        require HEADER;
        require APP . '/views/register.php';
        require FOOTER;
    }
    public function process() {
    if(isset($_POST['submit_register'])){
        $uname = trim($_POST['username']);
        $umail = trim($_POST['email']);
        $upass = trim($_POST['password']); 
 
        if($uname=="") {
            $error[] = "provide username !"; 
        }
        else if($umail=="") {
            $error[] = "provide email id !"; 
        }
        else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
            $error[] = 'Please enter a valid email address !';
        }
        else if($upass=="") {
            $error[] = "provide password !";
        }
        else if(strlen($upass) < 6){
            $error[] = "Password must be atleast 6 characters"; 
        }
    else{
        try{
            $stmt = $this->db->prepare("SELECT username,email FROM users WHERE username=:uname OR email=:umail");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
            if($row['username']==$uname) {
                echo "sorry username already taken !";
            }
            else if($row['email']==$umail) {
                echo "sorry email id already taken !";
            }
            else{
                //register(user);
            }
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    }
    }
}