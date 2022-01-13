<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style sheets -->
    <link rel="stylesheet" href="home1.css">
    <link rel="stylesheet" href="Normalise.css">
    <link rel="stylesheet" href="register.css">
    <title>Register</title>


    <style>
     .error{
        color: red;
        font-size: 0.6em;
     }

    </style>
</head>
<body>

<header class='sticky' id='nav_pages'>
        
       <a href='http://localhost/miniproject/home.php'><img  src='TFOE.png'  alt='Project_logo' id='logo'></a> 
        <nav>
            <a class='nav_pages' href='http://localhost/miniproject/home.php'>Home</a>
            <a class='nav_pages' href='http://localhost/miniproject/register1.php'>Register</a>
            <a class='nav_pages' href='http://localhost/miniproject/Locate.php'>Locate</a>
            <a class='nav_pages' href='home.php#footer'>Contact</a>
            <a href='http://localhost/miniproject/login.php'><button id='login_btn' >Login</button></a>


        </nav>

    </header>


<?php 
$fnameerr=$lnameerr=$dateerr=$aadharerr=$addresserr=$mobileerr=$checkerr="";

?>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

if(empty($_POST['fname'])){
    $fnameerr="Enter firstname";
}
else{
    $fname=$_POST['fname'];
}
if(empty($_POST['lname'])){
    $lnameerr="Enter lastname";
}
else{$lname=$_POST['lname'];}
if(empty($_POST['aadhar'])){
$aadharerr="Enter correct number";
}
else{$aadhar=$_POST['aadhar']; }
if(empty($_POST['mobileno'])){$mobileerr ="Enter the mobile number correct " ;}
else{$mobileno=$_POST['mobileno'];}

if(empty($_POST['address'])){$addresserr="Enter correct address";}
else{$address=$_POST['address']; }

if(isset($_POST['checkbox']) ){
$checkerrs=0;
}
else{ $checkerr="Click here" ;
$checkerrs=1;}
}
if(strlen($aadhar)!=12 && !empty($aadhar)){
    $aadharerr="Should contain 12 digits";
}
if(strlen($mobileno)!=10 && !empty($mobileno)){
    $mobileerr="Plz enter 10 digit monile no ";
}
?>
<?php 
if(isset($_POST['submit']))
{

if (!empty($fname) && !empty($lname) && !empty($aadhar) && !empty($address) && !empty($mobileno)  && !empty($address) && $checkerrs==0) {
$date=date('y-m-d',strtotime($_POST['date']));
$email=$_POST['email'];
$alnumber=$_POST['alnumber'];

$conn=new mysqli("localhost","root","","miniproject");
$conn2=new mysqli("localhost","root","","users");
if($conn->connect_error) {
    die(" PLEASE TRY AFTER SOME TIME "); 
}

$req1=$conn->query("SELECT * FROM registration where email='$email' and number='$mobileno' ");
if($req1->num_rows==0 ){
$sql="INSERT INTO registration(fname,lname,date,aadhar,address,email,number,alnumber) VALUES ('$fname','$lname','$date','$aadhar','$address','$email','$mobileno','$alnumber') ";
$queryrun=mysqli_query($conn,$sql);

$fullname= $fname.$lname;
$conn->query("INSERT INTO signup(name,mobileno,email,password,type) VALUES ('$fullname','$mobileno','$email','$mobileno','reg' )" );
$divide=explode('@', $email);
$tablename=$divide[0];
if($queryrun){

$conn2->query("CREATE TABLE $tablename(dates varchar(30),account varchar(20),type varchar(10),amount int ,Totalbalance int )");

echo '<script> window.alert("REGISTRATION SUCESSFULL 😀. You can login with email and password as mobile no ")</script>';

}

}
else{
      echo '<script> window.alert(" 😑 ACCOUNT ALREADY EXIST ")</script>';
}
$conn->close();
$conn2->close();
}

}
?>
     <section  id='register_form'>
        
        <h1>REGISTRATION FORM</h1>
     <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' name='details' method='post'>

    <table cellpadding='10' cellspacing='10' id ='form'>
        <tr>
            <td> First Name &nbsp; &nbsp;</td>
            <td><input type='text' name='fname' maxlength='50'> <span class=error>*  <?php echo "$fnameerr" ;?> </span></td>
            
        </tr> 
        <tr>
            <td>Last Name  &nbsp; &nbsp;</td>
            <td><input type='text' name='lname' maxlength='50'> <span class=error>*  <?php echo "$lnameerr" ;?> </span></td>
            
        </tr>
      
        <tr>
            <td>Date of Birth </td>
            <td> <input type='date' name='date' id='' required></td>
        </tr>
        <tr>
            <td>Aadhar No: </td>
            <td><input type='text' name='aadhar' maxlength='12'> <span class="error">*  <?php echo "$aadharerr" ;?> </span></td>
            
        </tr>
       <tr>
           <td>
              Address <span class="error">* <?php echo "$addresserr" ;?> </span>
           </td>
           <td>
               <textarea name='address' cols='30' rows='10' placeholder='Enter your adress here '></textarea>
               

           </td>
       </tr>

        <tr>
            <td>Email</td>
            <td>
               <input type='email' name='email' maxlength='30' required >
            </td>
        </tr>

        <tr>
            <td>
                Mobile Number: 
            </td>
            <td> 
                <input type='text' maxlength='10' name='mobileno'>
                <span class=error>*  <?php echo "$mobileerr" ;?> </span>

            </td>
        </tr>
        <tr>
            <td>
                Alternative Number
            </td>

            <td>
                <input type='text' maxlength='10' name='alnumber'>
            </td>
        </tr>
        
<tr>
   <table>
       <tr>
           <td> <input type='checkbox' name='checkbox' > <span class="error">* <?php echo "$checkerr"; ?> </span> <h6><span>I hereby declare that all the information furnished above is true to the best of my belief.</span></td>
       </tr>
   </table>
    </tr>
    </h6>
        <tr>
            <!-- <td>
                <input type="submit" name="submit" value="submit">
                <input type="reset" name="reset" value="reset">
            </td> -->
            <button id ='button_submit' class='form_button' name="submit">Submit</button>
            <button id ='button_reset' class='form_button'>Reset</button>
        </tr>
    </table>
</form>
</section>

 

    
        
    </body>

 </html>