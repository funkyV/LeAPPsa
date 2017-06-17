<?php
class USER extends Model{

    function __construct($db) {
        parent::__construct($db);
    }

    public function redirect($url){
      header('location: ' . URL_WITH_INDEX_FILE . $url);
   }

   /*
    * Returneaza toate emailurile unui user
    */
   public function getUserEmails() {
       $sql = "SELECT email FROM users";

       $query = $this->db->prepare($sql);
       $query->execute();

       $result = $query->fetchAll(PDO::FETCH_ASSOC);

       return $result;
   }

   public function getQuestionRecipientsForEmails($emailList) {
       $sql = 'SELECT id FROM users WHERE email in ' . $emailList;

       $query = $this->db->prepare($sql);
       $query->execute();

       return $query->fetchAll(PDO::FETCH_ASSOC);
   }



   public function login($umail,$upass){
       try{
          $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:umail LIMIT 1");
          $stmt->execute(array(':umail'=>$umail));
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

   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }

   public function register($uname,$umail,$upass)
    {
       try
       {
           $new_password = password_hash($upass, PASSWORD_DEFAULT);
   
           $stmt = $this->db->prepare("INSERT INTO users (username,email,password) 
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
              return $userRow[$detail];
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function updateDetails($id, $detail, $value){
                try{
                    $sql = "UPDATE users SET ".$detail." = :value WHERE id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute(array(':id'=>$id, ':value'=>$value));
                    return true;
                }
                catch(PDOException $e){
                   echo $e->getMessage();
                   return false;
                }
    }
    //returneaza nr de randuri dintr-un tabel, acele randuri ce au id-ul = $id
    public function getNumOfById($id, $tabel){
    try
    {
          $stmt = $this->db->prepare("SELECT * FROM ".$tabel." WHERE id = ".$id."");
          $stmt->execute();
          $stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
              return $stmt->rowCount();
          }
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   //returneaza numarul de randuri dintr-un tabel
   public function getNumOf($tabel){
    try
    {
          $stmt = $this->db->prepare("SELECT * FROM ".$tabel."");
          $stmt->execute();
          $stmt->fetch(PDO::FETCH_ASSOC);
           
          if($stmt->rowCount() > 0)
          {
              return $stmt->rowCount();
          }
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   //returneaza ultima valoare adaugata intr-un tabel
   public function lastEntry($field,$tabel){
    try
    {
          $stmt = $this->db->prepare("SELECT * FROM ".$tabel." ORDER BY id DESC LIMIT 1");
          $stmt->execute();
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
              return $userRow[$field];
          }
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   //functia lastQuestion returneaza id-ul ultimei intebari adaugate 
   public function lastQuestion(){
    try
    {
          $stmt = $this->db->prepare("SELECT * FROM questions  ORDER BY date DESC LIMIT 1");
          $stmt->execute();
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
              return $userRow['id'];
          }
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   /*
   *
   *Functia mostPopularQuestion($detail) primeste ca parametru denumirea coloanei si returneaza valoarea acesteia,  
   *corespunzatoare intrebarii cu cel mai mare numar de raspunsuri
   *
   */
   public function mostPopularQuestion($detail){
    try
    {
          $stmt = $this->db->prepare("SELECT * FROM questions  ORDER BY answered DESC LIMIT 1");
          $stmt->execute();
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
   /*
   *
   *Functia getDetailsByTable(id, coloana, tabel) primeste ca parametru id-ul, coloana(denumire), numele tabelului si returneaza 
   *valoarea de pe coloana corespunzatoare id-ului
   *
   */
   public function getDetailsByTable($id, $detail, $table){
    try
    {
          $stmt = $this->db->prepare("SELECT * FROM ".$table." WHERE id = ".$id." LIMIT 1");
          $stmt->execute();
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
   /*
   *
   *Functia isAnswered([param]) primeste ca parametru id-ul intrebarii si ii mareste valoarea "answered" cu o unitate
   *Returneaza True daca a reusit, False altfel.
   *
   */
   public function isAnswered($id){
       $value = getDetailsByTable($id, 'answered', 'questions');
       $value++;
                try{
                    $sql = "UPDATE questions SET answered = ".$value." WHERE id = ".$id."";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();
                    return true;
                }
                catch(PDOException $e){
                   echo $e->getMessage();
                   return false;
                }
    }

   public function questionsSentToUser($userId){
    try
    {
        $sql = ("select q.question, q.id , u.username from recipients r inner join questions q on r.question_id = q.id inner join users u on q.user_id = u.id where r.receiver_id = :id ");
          $querry = $this->db->prepare($sql);
          $querry->execute(array(':id'=>$userId));
          $dataRow = $querry->fetchAll();
          //print_r($dataRow);
          if(!empty($dataRow)){
          $array = get_object_vars($dataRow[0]);
          for( $i=0;$i<sizeof($dataRow);$i++) {
            $array = get_object_vars($dataRow[$i]);
                echo '</tr>
                <h4>' . htmlspecialchars($array['question']) .
                '</h4> <label class="user-started" id="user">adresata de catre '
                . htmlspecialchars($array['username']) . '</label> 
                </tr> <label class="separator"></label>';
                }
                return true;
          }{echo '<h3>Ne pare rau, nu ai primit inca nicio intrebare!</h3>';}     
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function getUserNrQuestions($userId){
    try
    {
          $stmt = $this->db->prepare("SELECT * FROM questions WHERE user_id = ".$userId."");
          $stmt->execute();
         $stmt->fetch(PDO::FETCH_ASSOC);
              return $stmt->rowCount();
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function getUserNrAnswers($userId){
    try
    {
          $stmt = $this->db->prepare("SELECT * FROM answers WHERE user_id = ".$userId."");
          $stmt->execute();
         $stmt->fetch(PDO::FETCH_ASSOC);
              return $stmt->rowCount();
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }


   public function getNotification($userId){
    try
    {
        $sql = ("select users.username as username, users.id as userId , recipients.question_id as qID from users join recipients on users.id = recipients.sender_id where recipients.receiver_id = :id");
          $querry = $this->db->prepare($sql);
          $querry->execute(array(':id'=>$userId));
          $dataRow = $querry->fetchAll();
          //var_dump($dataRow);
          if(!empty($dataRow)){
          $array = get_object_vars($dataRow[0]);
          //var_dump($array);
          for( $i=0;$i<sizeof($dataRow);$i++) {
            $array = get_object_vars($dataRow[$i]);
                echo '</tr>
                <h4>Esti invitat sa raspunzi la <a href="/answeredQuestion/id/'
                . htmlspecialchars($array['userId']) . '">aceasta</a> 
                intrebare de catre <a href="/senderProfile/id/'
                . htmlspecialchars($array['userId']) . '"> '
                . htmlspecialchars($array['username']) . '</a> !</h4> 
                </tr> <label class="separator"></label>';
            }
            return true;
          }else {echo '<h3>Nu ai notificari noi! Pune o intrebare!</h3>';}        
    }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }


}
?>