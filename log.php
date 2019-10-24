<?php
session_start();
echo $_SESSION['phone'];
echo $phone;

 $conn = mysqli_connect('localhost','root','','test');

    $query = "SELECT phone from user where phone = '$phone'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
          header("location:error.php");
        }
    } 

?>