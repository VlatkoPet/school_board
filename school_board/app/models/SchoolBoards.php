<?php
class SchoolBoards{
  
    // database connection and table name
    private $conn;
    private $table_name = "school_board";
  
    // object properties
    public $name;
    public $created_at;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    function getAllSchoolBoards(){
  
        // select all query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name;
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function getSchoolBoardsNameById($id){
  
        // select all query
        $query = "SELECT
                    name
                FROM
                    " . $this->table_name . "
                WHERE id = $id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }


    
}




?> 
