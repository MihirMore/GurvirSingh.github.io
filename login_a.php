<?php
    $conn = mysqli_connect('localhost','u966723543_root','testtest','u966723543_svsm');

    $name = $_POST['uname'];
    $pass = $_POST['pass'];

    $sql = "SELECT `phone`,`name`, `pass` FROM `user` WHERE phone = '$name' and pass = '$pass' " ;
    
    $result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["name"];
    }
} else {
    echo null;
}

mysqli_close($conn);

?>