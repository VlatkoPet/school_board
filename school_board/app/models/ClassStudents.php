<?php
class ClassStudents{
  
    // database connection and table name
    private $conn;
    private $table_name = "class_students";
  
    // object properties
    public $student_id;
    public $class_id;
    public $grade_id;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    function getAllGradesForStudent($student_id){
  
        // select all query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name. "
        WHERE
            student_id = $student_id
        ORDER BY 
            created_at DESC ";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    function getAllGradesForStudentForClass($student_id, $class_id){
  
        // select all query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name. "
        WHERE
            student_id = $student_id
        WHERE
            class_id = $class_id
        ORDER BY 
            created_at DESC ";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    
    
}




?> 
