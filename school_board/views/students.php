<?php 
  include 'app.php';
    include_once '../config/database.php';
    include_once '../app/models/Students.php';
    include_once '../app/models/SchoolBoards.php';
    // include_once '../app/controllers/StudentController.php';
    
        // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize models
    $students = new Students($db);
    $school_boards = new SchoolBoards($db);    
    // $studentController = new StudentsController($students);



    $get_all_school_boards = $school_boards->getAllSchoolBoards();
    if(isset($_POST['school_board_id'])){
     $school_board_id = $_POST['school_board_id'];
    }else{
        $school_board_id = "";
    }


    $getAllStudents = $students->getAllStudentsBySchoolBoard($school_board_id);
    $numAll = $getAllStudents->rowCount();



    
?>

<div class="container mt-5">




<form id="triggerHistory" name="filter" method="POST" action="students.php">
    Filter Students by Board:
        <select name="school_board_id">
            <option value="" >Select</option>
    <?php while ($row = $get_all_school_boards->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $row['id'];?>">
            <?php echo $row['name'];?></option>
    <?php }?>
        </select>

    <input type="submit" name="submit" value="Submit">
</form>


<div class="div-table">
    <table>
        <thead style="background-color:#e0dede">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
        <?php 



        if(isset($getAllStudents) && ($numAll > 0)){
        while ($row = $getAllStudents->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td></td>
                <td> <?php echo $row['name']; ?></td>
                <th> <?php echo date("H:i:s d-m-Y", strtotime($row['created_at'])); ?></th>
                <th>
                    <a href="result.php?id=<?php echo $row['id']; ?>">Check if passed</a>
                </th>
            </tr>
        <?php } }else{  ?>
            <tr>
                <td>
                   <p style="margin-top:20px;text-align:center;color:blue;width:100%">You don't have students in this board</p>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>



 
</div>