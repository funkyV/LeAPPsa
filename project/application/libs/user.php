<?php
class USER
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }

    public function redirect($url)
   {
      header('location: ' . URL_WITH_INDEX_FILE . $url);
   }

}
?>