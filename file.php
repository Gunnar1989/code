<?php
class File{
    private $conn;
    private $table_name = "files";
    public $storageID;
    public $accessID;
    public function __construct($db){
        $this->conn = $db;
    }

function readOne(){
     $query = "SELECT
               *
            FROM
                " . $this->table_name . "
            WHERE
                accessID = ?
            LIMIT
                0,1";

    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->accessID);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->accessID = $row['accessID'];
    $this->storageID = $row['storageID'];
    $this->filetype = $row['filetype'];

}};
?>