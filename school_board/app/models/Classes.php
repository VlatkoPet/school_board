<?php
class Classes{
  
    // database connection and table name
    private $conn;
    private $table_name = "classes";
  
    // object properties
    public $name;
    public $created_at;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
//     se ulucuva alarmot samo ako zapisot e open i ako pristigne zapis so flag=1
    function getAllClasses(){
  
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


    
}




?> 
