<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style sheets -->
<!--     <link rel="stylesheet" href="home1.css">
     -->
     <link rel="stylesheet" href="login_interface.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="Normalise.css">


    <title>Log In</title>
</head>
<body>


<?php
error_reporting(0);

    if($_SERVER['REQUEST_METHOD']=="POST"){


$connection=new mysqli("localhost","root","","miniproject"); 

if($connection->connect_error){
    die("Some thing went Wrong  ");
}
else{
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql=$connection->query("SELECT * FROM  signup WHERE email='$email' and password='$password' ");



        if($sql->num_rows <1){
              echo '<script> window.alert(" 📄 No details Found Please Signup ")</script>';
    echo '<script> window.location.href="http://localhost/miniproject/signup1.php" </script>' ; 


        }
        else{
             $res=$sql->fetch_assoc();
            if($res['type']=='reg'){
                $_SESSION['email']=$_POST['email'];
                $_SESSION['password']=$_POST['password'];
                header('location:Register_interface.php');
            }
            if($res['type']=='user'){
              $_SESSION['email']=$_POST['email'];
                $_SESSION['password']=$_POST['password'];
                header('Location:Login_interface.php');
            }

            $name=$res['name'] ;
            $email=$res['email'];
            $mobileno=$res['mobileno'];


        } 



}


$connection->closed();

    }


?>
    <section id ="login_total" >
        <div id="login" >
            <div>
                <img src="https://images.unsplash.com/photo-1511376979163-f804dff7ad7b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="login_interface" id="login_bg">
    
            </div>
            <div id="login_main" >
 
                        <!-- <h1 id="log_h1"style="font-size: 2em;">Log In</h1>   
                        <label class="headings_form">Email</label>
                        <input type="email" name="email" class="inputs" placeholder="">
                        <br>
                        <label class="headings_form">Password</label>
                        <input type="password"vclass="inputs" name="password" placeholder=""> -->

                        <img src="Avatar (2).png" alt="avatar" id="avatar_logo">
                        <h1 >Log In</h1>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id ="login_form" method="POST">
                            <p>Email Id</p>
                            <input type="email" name='email' placeholder="Enter your mail" required>
                            <p>Password</p>
                            <input type="password" name ='password' placeholder="Enter password" required>
                            <input style="text-align: center;"  type="submit" name="submit" value="Login">
                            <br>
                            <a href="http://localhost/miniproject/Forgot_pass.php">Forgot password?</a>
                            <br>
                            <a id="signup"href="http://localhost/miniproject/signup1.php">Don't have an account?</a>
                            
                        </form>
                        
            </div>
        </div>
       
    </section>



</body>
</html>
