<?php 

$conn = new mysqli("localhost", "root", "", "cs19i");

if($conn->connect_error){
    echo $conn->error;
}

?>