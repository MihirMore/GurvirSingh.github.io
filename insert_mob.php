<?php
require('textlocal.class.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){

    define('host','localhost');
    define('user','u966723543_root');
    define('password','testtest');
    define('db','u966723543_svsm');
    
    
    $connect = mysqli_connect(host,user,password,db);

    createUser();
}

function createUser(){
    require('textlocal.class.php');
    global $connect;

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $num = $_POST["num"];
    $pass = $_POST["pass"];
    $otp = $_POST["otp"];

    $query = "Insert into user(name,phone,num,pass,otp) values ('$name',$phone,'$num','$pass','$otp');";

    mysqli_query($connect,$query) or die (mysqli_error($connect));

    $apikey = "dBuWWJ7RA0O4YJi7o3T0Ew";
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
    $data = curl_exec($ch);
  
    mysqli_close($connect);
} 

?>