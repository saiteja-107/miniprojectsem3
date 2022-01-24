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
        
        <table class='styled-table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>$name</td>
                <td>$email</td>
                <td>$mobileno</td>
            </tr>
            
            <!-- and so on... -->
        </tbody>
    </table>
    <table class='styled-table'>
        <thead>
            <tr>
                <th>Account</th>
                <th>Total Balance</th>
                <th>Validity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>91{$mobileno}</td>
                <td>import</td>
                <td>import</td>
            </tr>
        
            <!-- and so on... -->
        </tbody>
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
