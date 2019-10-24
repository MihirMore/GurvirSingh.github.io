<?php
$conn = mysqli_connect('localhost','u966723543_root','testtest','u966723543_svsm');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$comment = $_POST['subject'];
$sql = "INSERT INTO `contact`(`FirstName`, `LastName`, `comments`) VALUES ('$firstname','$lastname','$comment')";

if ($conn->query($sql) === TRUE) {
    header("location:success.php");
} else {
    header("location:error.php");
}

?>