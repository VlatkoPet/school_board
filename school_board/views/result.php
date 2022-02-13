<?php 
  include 'app.php';
    include_once '../config/database.php';
    include_once '../app/models/Students.php';
    include_once '../app/models/SchoolBoards.php';
    include_once '../app/models/ClassStudents.php';
    // include_once '../app/controllers/StudentController.php';
    
        // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize models
    $students = new Students($db);
    $school_boards = new SchoolBoards($db);   
    $class_students = new ClassStudents($db);   
    // $studentController = new StudentsController($students);



    if(isset($_GET['id'])){
     $student_id = $_GET['id'];
    }else{
        $student_id = "";
    }


    $result_query = $students->getStudentCredentials($student_id);
    $result = $result_query->fetch(PDO::FETCH_ASSOC);



    $result_class_students = $class_students->getAllGradesForStudent($student_id);
    $result_grades = $result_class_students->fetchAll(PDO::FETCH_ASSOC);




    
?>

<div class="container mt-5">


<?php echo (json_encode($result)); ?>
<br>




 
</div>