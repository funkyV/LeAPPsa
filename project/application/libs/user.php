<?php
class USER
{
    private $db;
 
    function __construct($DB_con){
      $this->db = $DB_con;
    }

    public function redirect($url){
      header('location: ' . URL_WITH_INDEX_FILE . $url);
   }

   public function login($uname,$umail,$upass){
       try{
          $stmt = $this->db->prepare("SELECT * FROM users WHERE username=:uname OR email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $userRow['password']))
             {
                $_SESSION['user_session'] = $userRow['id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin(){
      if(isset($_SESSION['user_session']))
      {
         return true;
      }else
      return false;
   }

   public function register($fname,$lname,$uname,$umail,$upass)
    {
       try
       {
           $new_password = password_hash($upass, PASSWORD_DEFAULT);
           $stmt = $this->db->prepare("INSERT INTO users(username,email,password) 
                                                       VALUES(:uname, :umail, :upass)");
              
           $stmt->bindparam(":uname", $uname);
           $stmt->bindparam(":umail", $umail);
           $stmt->bindparam(":upass", $new_password);            
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }

    public function getDetails($id, $detail){
    try
    {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
          $stmt->execute(array(':id'=>$id));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
              return $userRow[$detail];
          }
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function updateDetails($id, $detail, $value){
        try
    {
          $sql = "UPDATE users SET ".$detail." = :value WHERE id = :id";
          $stmt = $this->db->prepare($sql);
          $stmt->execute(array(':id'=>$id, ':value'=>$value));
          return true;
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
           return false;
       }
   }

}
?>