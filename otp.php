<?php session_start();
$_SESSION['count']=2;
$otp=$_SESSION['otp'];
$mail=$_SESSION['email'];
$conn=new mysqli("localhost","root","","change");

?>
<?php
if(isset($_POST['otp'])){
if($_POST['value']!=$otp && $_SESSION['count']!=0 ) {

 echo "<script> window.alert('Incorrect OTP ')</script>";
$_SESSION['count']-=1;
    header('Location:otp.php');}
else if($_POST['value']==$otp && $_SESSION['count']!=0){
    $_SESSION['email']=$mail;
    $conn->query("UPDATE otpverify set status=1 where otp='$otp'");
    echo "<script> window.alert('Sucessful Otp valid  ')</script>";

    header('Location: newotp.php');
    
}
else{
    echo "<script> window.alert('Too Many attempts ')</script>";
    session_destroy();
    header('Location:home.php');

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
    <style>
    #content{
        width:10%;
        background-color:grey; 
        margin:15%;
        margin-left:40%;
        padding:3%;
        padding-right:5%;
        border-radius:25px; 
       }
      
    input{
        
        margin:5%;
        margin-left:10%;
    }
    input[type='submit']{
        padding:2% 30%;
        margin-left:5%;
    }
    input[type='submit']:hover{
        background-color:orange;
    }
    </style>
</head>
<body>
    <div id='content' >

    <center>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<strong>
Enter OTP : <input type="number" name="value" require >
</strong>
<br>
<input type="submit" name="otp" value='Submit OTP'>
</form>
</center>
    </div>


</body>
</html>
