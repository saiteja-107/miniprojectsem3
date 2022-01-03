<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style sheets -->
    <link rel="stylesheet" href="home1.css">
    <link rel="stylesheet" href="Normalise.css">
    <link rel="stylesheet" href="signup.css">
    <title>Sign Up</title>
</head>
<body>

    <!-- <header>
        <img  src="TFOE.png" alt="Project_logo" id="logo">
        <nav>
            <a class="nav_pages"href="home.html">Home</a>
            <a class="nav_pages"href="Register.html">Register</a>
            <a class="nav_pages"href="Locate.html">Locate</a>
            <a class="nav_pages"href="Recharge.html">Recharge</a>
            <a href="login.html"><button id="login_btn">Login</button></a>
        </nav>
    </header> -->
<?php

$nameerror=$passworderror=$emailerror=$mobileerror="";
if($_SERVER['REQUEST_METHOD']=="POST"){

if(empty($_POST["name"])){
    $nameerror ="Name Must be required ";
}
else{
    $name=$_POST['name'];
}
if(empty($_POST['email'])){
    $emailerror="Emial must be enter ";
}
else{
    $email=$_POST['email'];
}
if(empty($_POST['mobileno'])){
    $mobileerror="Mobile Number Must be INserted ";
}
else{
$mobileno=$_POST['mobileno'];
}
if (empty($_POST['password'])) {
$passworderror="password mUST BE eNTERED ";
}
else {
    $password=$_POST['password'];
}
}

if(!empty($_POST['password'] && !empty($_POST['name'] && !empty($_POST['email'] && !empty($_POST['mobileno']))))){

$connection =new mysqli("localhost","root","","miniproject");

if($connection->connect_error){
    die("Error Occured In connection ");
}

else{



$sql="INSERT INTO signup(name,mobileno,email,password) VALUES ('$name',$mobileno,'$email','$password')";

$verify=$connection->query("SELECT * FROM signup WHERE   mobileno=$mobileno or email='$email' " );


if($verify->num_rows>=1){
    echo '<script> window.alert(" ❗️❗️ Already Exist please login ")</script>';
    echo '<script> window.location.href="http://localhost/update1/login.php" </script>';
}

else{



if($res=$connection->query($sql)){
echo ' <script> window.alert("Signup sucessful . You can login 😃 ")</script>';


    echo ' <script> window.location.href="http://localhost/miniproject/home.php" </script>  ';

}
else{
    echo '<script> window.alert(" ❌  Some thing went wrong ")</script>';
    echo '<script> window.location.href="http://localhost/miniproject/signup1.php" </script>' ; 
    }
}
}

$connection->close();

}

?> 

    
    <section id ="login_total" >
        <div id="login" >
            <div>
                <img src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="login_interface" id="login_bg">
    
            </div>
            <div id="login_main" >
 
                        <!-- <h1 id="log_h1"style="font-size: 2em;">Log In</h1>
                        <label class="headings_form">Email</label>
                        <input type="email" name="email" class="inputs" placeholder="">
                        <br>
                        <label class="headings_form">Password</label>
                        <input type="password"vclass="inputs" name="password" placeholder=""> -->

                        <img src="Avatar (2).png" alt="avatar" id="avatar_logo">
                        <h1 >Sign Up</h1>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id ="login_form" method="POST">

                                    <span class="error"><?php echo $nameerror ?> </span><br>
                                    <strong><label for="name"> Name <sup><span class="warning">*</span> </sup> : <input type="text" name='name'  id='name' placeholder="name" ></label> </strong>
                                    <br>
                                    <span class="error"><?php echo $emailerror ?> </span><br>
                                    <strong><label for="email"> Email <sup><span class="warning">*</span></sup> : <input type="email" name='email' id="email" placeholder="email"></label></strong>
                                    <br>
                                    <span class="error"><?php echo $mobileerror ?> </span><br>
                                    <strong><label for="mobileno">Mobile NO <sup><span class="warning">* </span></sup>: <input type="number" name="mobileno" id='mobileno'  placeholder="9876543210" > </label></strong>
                                    <br>
                                    <span class="error"><?php echo $passworderror ?> </span><br>
                                    <strong><label for="password"> Password <span class="warning">* </span> : <input type="password" name="password" id='password'></label> </strong>
                                   
                                    <br>
                           <!--  <p>Name</p>
                            <input type="text" name="name" placeholder="Enter your name">
                            <p>Mobile No</p>
                            <input type="number" name="mobileno" placeholder="Enter your ph no">
                            <p>Email Id</p>
                            <input type="email" name="email" placeholder="Enter your mail">
                            <p>Password</p>
                            <input type="password" name ="password" placeholder="Enter username"> -->
                            <input style="text-align: center;"  type="submit" name="submit" value="SignUp">
                            <!-- <br>
                            <a href="#">Forgot password?</a>
                            <br>
                            <a id="signup"href="#">Don't have an account?</a> -->

                        </form>
                        
            </div>
        </div>
       
    </section>



</body>
</html>
