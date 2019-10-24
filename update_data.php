<?php
session_start();
$host = "localhost";
$user = "u966723543_root";
$pwd = "testtest";
$db = "u966723543_svsm";


$conn = mysqli_connect($host,$user,$pwd,$db);

$uname = $_POST['name'];
$ucontact = $_POST['phone'];
$uvehicle = $_POST['num']."-".$_POST['num1']."-".$_POST['num2']."-".$_POST['num3'];

$user1 = $_SESSION['user'];
$phone = $_SESSION['phone'];

if($uname == "" && $ucontact == "" && $uvehicle == "---")
{
    echo "No Data";
}
    if($uname !== "")
    {
        $sql = "UPDATE `user` SET `name`= '$uname' WHERE `name` = '$user1'";

        if ($conn->query($sql) === TRUE) {
            header("location:success.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
        if($ucontact !== "")
        {
            $sql1 = "UPDATE `user` SET `phone`= $ucontact WHERE `phone` = $phone";
    
            if ($conn->query($sql1) === TRUE) {
                header("location:success.php");
            } else {
                echo "Error updating record: " . $conn->error;
            }
            
        }
        
        if($uvehicle !== "---")
    {
        $sql2 = "UPDATE `user` SET `num`= '$uvehicle' WHERE `phone` = $phone";

        if ($conn->query($sql2) === TRUE) {
            header("location:success.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
    }

   
?>