<?php
class Database{
    
   
    public $conn;
  
    public function getConnection(){
  
        $host = "mysql78.unoeuro.com";
        $port = "3306";
        $username = "vitasim_dk";
        $password = 'vitaSIM2019';
        $dbname = "vitasim_dk_db";
        $this->conn = null;
  
        try{
            $this->conn =new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>