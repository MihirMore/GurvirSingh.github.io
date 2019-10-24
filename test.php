<?php

$conn = mysqli_connect('localhost','u966723543_root','testtest','u966723543_svsm');

$data = $_GET['data'];

//add insert to database code

echo $data;

$sql = "Insert into data(data) values ('$data');";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>