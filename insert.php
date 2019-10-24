<?php
session_start();
error_reporting(0);
require('textlocal.class.php');

if(isset($_POST['login']))
{
    header("location:error.php?login=true");
if($_SERVER["REQUEST_METHOD"]=="POST"){
 
    $conn = mysqli_connect('localhost','u966723543_root','testtest','u966723543_svsm');

    $phone = $_POST["phone"];
    $pass = $_POST["pswd"];

    $sql = "SELECT `phone`,`name`,`pass`,`otp` from user where phone = $phone and pass = '$pass'";
    
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $phone = $row['phone'];
            $_SESSION['user'] = $name;
            $_SESSION['phone'] = $phone;
            if($row['otp']!= 0)
            {
                $_SESSION['phone'] = $phone;
            header("location:otp_check.php");
            }
            else{
            header("location:loggedin.php");
            }
        }
    } else {
        echo "Error Occured Check if you are registered!";
    }
    $conn->close();
} 
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    echo "Inside req method post";
    define('host','localhost');
    define('user','u966723543_root');
    define('password','testtest');
    define('db','u966723543_svsm');
    
    $connect = mysqli_connect(host,user,password,db);
    
    createUser();
}

function createUser(){

    if(isset($_POST['submit1'])){
    global $connect;

    echo "Inside createUser() ";

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $num = $_POST['num']."-".$_POST['num1']."-".$_POST['num2']."-".$_POST['num3'];
    $pass = $_POST["pass"];
    $email = $_POST['email'];

    $conn = mysqli_connect('localhost','u966723543_root','testtest','u966723543_svsm');

    $query = "SELECT phone from user where phone = '$phone'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
          header("location:error.php");
        }
    } 
    else{
        echo "Inside else of createUser() ";
        //Send OTP to user
   /* $textlocal = new Textlocal(false, false, 'lWlpM0FMYuw-hreoMFSFg1WnNGCz1C6H6kwVBYA0aN');

    $randno = rand(100000,999999);

    $numbers = array($phone);
    $sender = 'TXTLCL';
    $message = 'Hello'.$name.', Your OTP is'.$randno;

    try {
         $result = $textlocal->sendSms($numbers, $message, $sender);
        print_r($result);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }*/
    $randno = rand(100000,999999);
        
    $query = "Insert into user(name,email,phone,num,pass,otp) values ('$name','$email',$phone,'$num','$pass','$randno')";

    if(mysqli_query($connect,$query)){
        $_SESSION['phone'] = $phone;
        $chk = 0;
        
       $textlocal = new Textlocal(false, false, 'lWlpM0FMYuw-hreoMFSFg1WnNGCz1C6H6kwVBYA0aN');


    $numbers = array($phone);
    $sender = 'TXTLCL';
    $message = 'Hello, '.$name.'. Your OTP for SVSM is '.$randno.' https://www.kgmsecurity.tech';

    try {
         $result = $textlocal->sendSms($numbers, $message, $sender);
        print_r($result);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
    /*
        $apikey = "dBuWWJ7RA0O4YJi7o3T0Ew";
        $apisender = "SMSTST";
        $msg ='Hello, '.$name.'. Your OTP for SVSM is '.$randno.' http://delama.xyz/project';
        $num = $phone;    // MULTIPLE NUMBER VARIABLE PUT HERE...!                 
     
        $ms = rawurlencode($msg);   //This for encode your message content                 		
     
        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$num.'&text='.$ms.'&route=1';
                         
        //echo $url;
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
        $data = curl_exec($ch); */
            $chk++;
        if($chk>0){
            header('location:otp_check.php');
            }
        }
    else{
        header("location:error.php?login=true");
        die (mysqli_error($connect));
        mysqli_close($connect);
    }
} 
    }
    else{
        echo "Inside createUser_mob else() ";
        createUser_mob();
    }
}

function createUser_mob(){
    echo "Inside createUser_mob() ";
    global $connect;

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $num = $_POST['num']."-".$_POST['num1']."-".$_POST['num2']."-".$_POST['num3'];
    $pass = $_POST["pass"];
    $otp = $_POST["otp"];
    $email = $_POST["email"];

    $conn = mysqli_connect('localhost','u966723543_root','testtest','u966723543_svsm');

    $query = "SELECT phone from user where phone = '$phone'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
          echo "You are already registered!";
        }
    } 
    else{
        //echo "Inside createUser() else";
    $query = "Insert into user(name,email,phone,num,pass,otp) values ('$name','$email',$phone,'$num','$pass',$otp)";

    if(mysqli_query($connect,$query)){
        $_SESSION['phone'] = $phone;
        $chk = 0;
        $textlocal = new Textlocal(false, false, 'lWlpM0FMYuw-hreoMFSFg1WnNGCz1C6H6kwVBYA0aN');


        $numbers = array($phone);
        $sender = 'TXTLCL';
        $message = 'Hello, '.$name.'. Your OTP for SVSM is '.$otp.' https://www.kgmsecurity.tech';

        try {
            $result = $textlocal->sendSms($numbers, $message, $sender);
            print_r($result);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    
       /* $apikey = "dBuWWJ7RA0O4YJi7o3T0Ew";
        $apisender = "SMSTST";
        $msg ='Hello, '.$name.'. Your OTP for SVSM is '.$otp.' http://delama.xyz/project';
        $num = $phone;    // MULTIPLE NUMBER VARIABLE PUT HERE...!                 
     
        $ms = rawurlencode($msg);   //This for encode your message content                 		
     
        $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$num.'&text='.$ms.'&route=1';
                         
        //echo $url;
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
        $data = curl_exec($ch); */
            $chk++;
        if($chk>0){
            header('location:otp_check.php');
            }
        }
    else{
        die (mysqli_error($connect));
        mysqli_close($connect);
    }
}}

?>

