                                                           **README FILE**
                                                                   
                                                                   
**SOFTWARE DOWNLOAD AND CONFIGURING FILES**:
        Download Apache xampp from https://www.apachefriends.org/index.html .Install it to any one of your disk.Open directory Xampp/php/ delete the php config file and place the php config file from this directory to the deleted file directory. Open directory Xaamp/sendmail. delete send mail config file and place the config file from this directory .Place this miniproject directory in Xampp/htdoc/ .
        
        
        <img width="500" alt="xaamp image " src="https://user-images.githubusercontent.com/96662580/150686467-1783893d-b620-4d9b-9019-2cd5f3d2a4b3.png"  ><figcaption>XAMPP .</figcaption>

        

**Running XAAMP** : After Downloading xampp applicationand configuring  open xampp click on start for MYSQL AND APACHE servers .

**CREATING DATABASE** : After running MYSQL and Apache server. Open any browser and search http://localhost/  which shows phpmyadmin page. Click on new to create Data base and name it as miniproject . Import the sql files from the Miniproject directory to Database miniproject . Create another Database ,name it as users with no table init . Create a new database , name it as change import otpverify sql file from Miniproject directory by clicking import which shown on top of the phpmyadmin page.
 

**EXECUTION** : Open any Browser,search http://localhost/miniproject/home.php which open home page of project .It contains information about our project aim.
                There are different option in navigation bar which you can choose . 
                
               * Register : We You Want to be an retailer then you can fill the registration form.Make sure the detail which you enter are correct . If you enter 
                 anything wrong (In terms of Format ) it shows error .Address field must filled according to google maps 
                ( https://www.google.com/maps/@18.6543853,78.1222224,15z)
                
                
                
               *Signup:If you were a user and you dont have account you can signup there by clicking on login / dont have account. Make sure that Your email and  
                mobile must be unique ie, you mail should contain in our database
                
                
                *Login : We have two types of login 1) retail login which is used by retail and 2) User login which is used by regular users .In retail user , they
                can  deduct money from the regular user as for the charge for current .The money debited from customer is credited to the gas station owner. The
                user can rechage their acoount by entering amount in there login page . 
                
                
                *Locate : It is the main feature of our project. The user or any one can see the near by gas station so that they can see only gas station near 
                their area with there live location . It show the direction by redirectiong to google maps 
                
               
                * Forgot password: If any user or register  forgot the password they can chage their password by clicking on forgot password.Otp mail will be sended
                to your given mail address . If the otp gets valid then you can change your password 
                
                
                
                
                
                
                
