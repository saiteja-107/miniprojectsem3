<?php session_start(); 
$conn=new mysqli("localhost","root","","miniproject");

?>
<?php  
if(isset($_POST['submit'])){
    $newpassword=$_POST['newpassword'];
    $email=$_SESSION['email'];
    $sql=$conn->query("UPDATE signup SET password='$newpassword' WHERE email='$email' ");
    if($sql){
        echo "<script> window.alert('Sucessfully Updated  ')</script>";
        echo '<script> window.location.href="http://localhost/miniproject/login.php" </script>';

        
    }

        else{
            echo "<script> window.alert('Something Went Wrong ')</script>";
            echo '<script> window.location.href="http://localhost/miniproject/login.php" </script>';
        }
        session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update|Password</title>
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
        margin-left:-5%;
    }
    input[type='submit']:hover{
        background-color:orange;
    }
    span{
        text-align:center;
        margin-left:25%;
    }
    </style>
</head>
<body>
    <div id='content'>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<span> New Password : </span>
<input type="text" name="newpassword" require >
<br>
<input type="submit" name="submit" value='Confirm Password'>
</form></div>


</body>
</html>