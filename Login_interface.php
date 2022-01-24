<?php
session_start();
?>
<?php
$conn2=new mysqli("localhost","root","","users");
if(isset($_POST['submit'])){
 $recharge=$_POST['amount'];
 $email=$_SESSION['email'];
 $r1=explode('@',$email);
 $mail=$r1[0];
 date_default_timezone_set("Asia/Kolkata");
 $d=time();
 $dt=date("d-m-Y h:i:sa",$d);
 $sqll=$conn2->query("SELECT SUM(amount)as sum1 from $mail ");
 $res=$sqll->fetch_assoc();
$totalbalance=$res['sum1']+$recharge;
$conn2->query("INSERT INTO $mail VALUES( '$dt','SELF','credit', $recharge,$totalbalance)");
echo "<script> window.alert(' Done Sucessfully ')</script>";
}
$conn2->close();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='Normalise.css'>
     <link rel='stylesheet' href='Login_interface(1).css'>
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
       <?php
$connection=new mysqli("localhost","root","","miniproject");
$conn2=new mysqli("localhost","root","","users");
$email=$_SESSION['email'];
$_SESSION['email']=$email;
$password=$_SESSION['password'];
$sql=$connection->query("SELECT * FROM  signup WHERE email='$email' and password='$password' ");
$res=$sql->fetch_assoc();
            $name=$res['name'] ;
            $mobileno=$res['mobileno'];


$r1=explode('@',$email);
 $mail=$r1[0];

 $sqll=$conn2->query("SELECT SUM(amount)as sum1 from $mail ");
 $res2=$sqll->fetch_assoc();
$totalbalance=$res2['sum1']
?>
    
 <h1><sub>*****</sub> Welcome <?php  echo "$name" ?><sub>*****</sub></h1>

    <section id='upper_body'>
        <section id='data'>
        
        <table  width="600"  cellspacing="0" cellpadding="0"    class='styled-table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <?php echo " $name " ; ?></td>
                <td><?php echo " $email " ;?></td>
                <td> <?php echo "$mobileno" ;?> </td>
            </tr>
            
            <!-- and so on... -->
        </tbody>
  
        <thead>
            <tr>
                <th>Account</th>
                <th>Total Balance</th>
                <th>Validity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <?php echo"91{$mobileno}" ;?></td>
                <td><?php echo  " $totalbalance" ; ?> </td>
                <td>08-26 </td>
            </tr>

            <!-- and so on... -->
        </tbody>
    </table>
    
        </section >
       
        <section id ='profile'>
            
            
            <img src='Avatar (2).png' alt='avatar' id='avatar_logo'>
            <p>Hell0!! <?php echo "$name"; ?> </p>
        </section>
    </section>

      <section id='data2'>
    <?php  
$strip =(explode('@',$email));
$re1=$strip[0];
$quer=$conn2->query("SELECT * FROM $re1  ORDER BY dates");
?>

<table   width="600"  cellspacing="0" cellpadding="0" id='head_tb' >
    <thead>
    <tr name='tb' id='data2_th'>
     <th><strong>Date </strong></th>
     <th><strong>Account </strong></th>
     <th><strong>Type </strong></th>
     <th><strong>Amount </strong></th>
     <th><strong>Total</strong></th>
 </tr>
    </thead>

</table>

<table  width="600"  cellspacing="0" cellpadding="0" id='body_tb' >
   <tbody>
<?php
while ($res=$quer->fetch_assoc()) {
    $date=$res['dates'];
    $account=$res['account'];
    $type=$res['type'];
    $amount=$res['amount'];
    $total=$res['Totalbalance'];
?>

        <tr>
            <td><?php echo "$date"; ?></td>
            <td><?php echo "$account"; ?></td>
            <td><?php echo "$type" ;?></td>
            <td><?php echo "$amount"; ?></td>
             <td><?php echo "$total"; ?></td>

         </tr>

<?php

}


?>    
        </tbody>       
    </table>
       
    </section>
    <section id ='topup'>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST">
        
        <button id='topupbtn'>Top Up</button>       
        <input type='number' name='amount' placeholder='Amount'> 
        <input type="submit" id="subbtn" name="submit">
        </form>
    </section>
</body>
</html>
<?php
$connection->close();

$conn2->close();
?>