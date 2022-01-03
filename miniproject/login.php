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

    <title>Log In</title>
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
            $name=$res['name'] ;
            $email=$res['email'];
            $mobileno=$res['mobileno'];

       // echo " welcome $val";


        echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='Normalise.css'>
    <link rel='stylesheet' href='Login_interface.css'>
    <title>Login|User</title>
    
</head>
<body>
      
    <header id='nav_pages'>
        
        <img  src='TFOE.png'  alt='Project_logo' id='logo'>
        <nav>
            <a class='nav_pages'href='#data'>Data</a>
            <a class='nav_pages' href='#topup'>Topup</a>
                
            <a href='http://localhost/miniproject/home.php'><button id='logout_btn' >Logout</button></a>


        </nav>
    </header>
    <h1>Welcome  $name </h1>
    <section id='upper_body'>
        <section id='data'>
        
                 <table>
            <caption id='heading'>$name Info</caption>
            <tr>
                <th class='First_att' >Name</th>
                <th class='second_att'>Email</th>
                <th>Phone</th>

            </tr>
            <tr>
                <td class='First_att'> $name</td>
                <td class='second_att'>$email</td>
                <td>$mobileno</td>
            </tr>
        </table>

        <table>
            <tr>
                <th class='First_att'>Account</th>
                <th class='second_att' id='tb'>Total
                    Balance</th>
                <th id='vd'>Validity</th>

            </tr>
            <tr>
                <td class='First_att'>91{$mobileno}</td>
                <td class='second_att' id='tbimp'>import</td>
                <td id ='vdimp'>import</td>
            </tr>
        </table>
    
        </section >
    
            
       
        <section id ='profile'>
            
            
            <img src='Avatar (2).png' alt='avatar' id='avatar_logo'>
            <p>Hell0!! $name </p>

        </section>
    </section>
    <section id ='topup'>
    
        <button id='topupbtn'>Top Up</button>       

    </section>
    
    
</body>

</html>

         ";
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
                            <input type="password" name ='password' placeholder="Enter username" required>
                            <input style="text-align: center;"  type="submit" name="submit" value="Login">
                            <br>
                            <a href="#">Forgot password?</a>
                            <br>
                            <a id="signup"href="http://localhost/miniproject/signup1.php">Don't have an account?</a>
                        </form>
                        
            </div>
        </div>
       
    </section>



</body>
</html>
