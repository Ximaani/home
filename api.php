<?php 

header("Content-type: application/json");

include 'conn.php';
// Function readAll
// Function Insert
// Function Delete
// Function Update

// POST

$action = $_POST['action'];

function readAll($conn){
    $data = array();
    $message = array();
    // Read All Students In Database
    $query = "SELECT * FROM students";

    // Execute the Query
    $result = $conn->query($query);
    // success or error
    
    if($result){
        while($row = $result->fetch_assoc()){
            $data [] = $row;
        }

        $message = array("status" => true, "data" => $data);

    }else{
        $message = array("status" => false, "data" => $conn->error);

    }

    echo json_encode($message);

}

function readStudentInfo($conn){
    $data = array();
    $message = array();
    // Read All Students In Database

    $id =$_POST['id'];
    $query = "SELECT * FROM students WHERE id= '$id'";

    // Execute the Query
    $result = $conn->query($query);
    // success or error
    
    if($result){
        while($row = $result->fetch_assoc()){
            $data [] = $row;
        }

        $message = array("status" => true, "data" => $data);

    }else{
        $message = array("status" => false, "data" => $conn->error);

    }

    echo json_encode($message);

}



function deleteStudent($conn){
    $data = array();
    $message = array();
    // Read All Students In Database

    $id =$_POST['id'];
    $query = " DELETE FROM students WHERE id= '$id'";

    // Execute the Query
    $result = $conn->query($query);
    // success or error
    
    if($result){
        
        $message = array("status" => true, "data" => $data);

    }else{
        $message = array("status" => false, "data" => $conn->error);

    }

    echo json_encode($message);

}



function registerStudent($conn){
    $studentId = $_POST['id'];
    $studentName = $_POST['name'];
    $studentClass = $_POST['class'];

    $data = array();

    $query = "INSERT INTO students(id,name,class) VALUES('$studentId', '$studentName', '$studentClass')";

    $result = $conn->query($query);
    if($result){
        $data = array("status" => true, "data" => "Registered Successfully");
    }else{
        $data = array("status" => false, "data" => $conn->error);
    }

    echo json_encode($data);
}


function updateStudent($conn){
    $studentId = $_POST['id'];
    $studentName = $_POST['name'];
    $studentClass = $_POST['class'];

    $data = array();

    $query = "UPDATE students set name = '$studentName', class = '$studentClass' where id= '$studentId'";

    $result = $conn->query($query);
    if($result){
        $data = array("status" => true, "data" => "Updated Successfully");
    }else{
        $data = array("status" => false, "data" => $conn->error);
    }

    echo json_encode($data);
}


if(isset($action)){
    $action($conn);
}else{
    echo "Action Is Required....";
}

?>