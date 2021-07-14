<?php
// 'image' object
class Image{
 
    // database connection and table name
    private $conn;
    private $table_name = "image";
 
    // object properties
    public $ID;
    public $Filename;
    public $Path;
    public $Resolution;
    public $Transforms;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
// create new user record
function create(){
 
    // insert query
    $query = "INSERT INTO " . $this->table_name . "
            SET
                ID = :ID,
                Filename = :Filename,
                Path = :Path,
                Resolution = :Resolution,
                Transforms = :Transforms";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->ID=htmlspecialchars(strip_tags($this->ID));
    $this->Filename=htmlspecialchars(strip_tags($this->Filename));
    $this->Path=htmlspecialchars(strip_tags($this->Path));
    $this->Resolution=htmlspecialchars(strip_tags($this->Resolution));
    $this->Transforms=htmlspecialchars(strip_tags($this->Transforms));
 
    // bind the values
    $stmt->bindParam(':ID', $this->ID);
    $stmt->bindParam(':Filename', $this->Filename);
    $stmt->bindParam(':Path', $this->Path);
    $stmt->bindParam(':Resolution', $this->Resolution);
    $stmt->bindParam(':Transforms', $this->Transforms);
 
    // execute the query, also check if query was successful
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
 
// check if given email exist in the database
function fileExists(){
 
    // query to check if file exists
    $query = "SELECT ID, Path, Resolution, Transforms
            FROM " . $this->table_name . "
            WHERE Filename = ?
            LIMIT 0,1";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
 
    // sanitize
    $this->Filename=htmlspecialchars(strip_tags($this->Filename));
 
    // bind given file value
    $stmt->bindParam(1, $this->Filename);
 
    // execute the query
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    // if email exists, assign values to object properties for easy access and use for php sessions
    if($num>0){
 
        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // assign values to object properties
        $this->ID = $row['ID'];
        $this->Path = $row['Path'];
        $this->Resolution = $row['Resolution'];
        $this->Transforms = $row['Transforms'];
 
        // return true because file exists in the database
        return true;
    }
 
    // return false if file does not exist in the database
    return false;
}
 
// update a user record
public function update(){
 
    // if id needs to be updated
    $Trans_set=!empty($this->Transforms) ? ", Transforms = :Transforms" : "";
 
    // if no posted id, do not update the password
    $query = "UPDATE " . $this->table_name . "
            SET
                Filename = :Filename,
                Path = :Path,
                Resolution = :Resolution,
                {$Trans_set}
            WHERE ID = :ID";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->Filename=htmlspecialchars(strip_tags($this->Filename));
    $this->Path=htmlspecialchars(strip_tags($this->Path));
    $this->Resolution=htmlspecialchars(strip_tags($this->Resolution));
 
    // bind the values from the form
    $stmt->bindParam(':Filename', $this->Filename);
    $stmt->bindParam(':Path', $this->Path);
    $stmt->bindParam(':Resolution', $this->Resolution);
    $stmt->bindParam(':Transforms', $this->Transforms);
 
    // unique ID of record to be edited
    $stmt->bindParam(':ID', $this->ID);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
}