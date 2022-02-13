<?php
class Students{
  
    // database connection and table name
    private $conn;
    private $table_name = "students";
  
    // object properties
    public $name;
    public $school_board_id;
    public $created_at;
    public $updated_at;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
//     se ulucuva alarmot samo ako zapisot e open i ako pristigne zapis so flag=1
    function getAllStudentsBySchoolBoard($school_board_id){
  
        // select all query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . "
                WHERE
                    school_board_id = $school_board_id ";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }


    function getStudentCredentials($student_id){
  
        // select all query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . "
                WHERE
                    id = $student_id ";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }


    
}




?> 
