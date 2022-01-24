<?php session_start() ;?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='Normalise.css'>
     <link rel='stylesheet' href='Forgot.css'>
    <title>Forgot Password|Can't Login</title>
    
</head>
<body>
      <?php
      
    if(isset($_POST['submit'])){
        $val=$_POST['mailid'];
        $_SESSION['email']=$val;
        $conn=new mysqli("localhost","root","","miniproject");
        $conn2=new mysqli("localhost","root","","change");
        $sql=$conn->query("SELECT * FROM signup WHERE email='$val' ");
       if($sql->num_rows<1){
            echo '<script> window.alert("Account Not exist. Please Signup ")</script>';
          echo '<script> window.location.href="http://localhost/miniproject/signup1.php" </script>' ; 
       }
     else{
$subject = "change your Password";
$otp=rand(100000,999999);
$body = "Hi,OTP to change you password : $otp ";
$headers = "From:tfoeoffical@gmail.com";
$_SESSION['otp']=$otp;
if (mail($val, $subject, $body, $headers)) {

    $conn2->query("INSERT INTO otpverify VALUES('$val',$otp,0)");
    echo '<script> window.alert("OTP SENT TO YOUR MAIL   ")</script>';
    
    if($conn2){
    header('Location:otp.php');}
} else {
    echo '<script> window.alert("SOMETHING WENT WRONG  ")</script>';
    die();
}
        }
 }
      
      ?>


    <section id='main'>
        <h1>Get Back Your Account </h1>
        <div><hr></div>
        <p>
            Please enter your email address  to search for your account.
        </p>
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST" >
        <input type='email' name="mailid" placeholder='Email address'>
        <button id='Cancel' onclick="http://localhost/miniproject/home.php">Cancel </button>
            <button id='submit' name="submit" type="submit" > Submit </button>
        
    </form>
    </section>
    <footer id="footer" class="footer-distributed">

        <div class="footer-left">
        <img src="https://scwcontent.affino.com/AcuCustom/Sitename/DAM/018/electric_cars.jpg">
            <h3>About<span>TFOE</span></h3>
        
            <p class="footer-links">
                <a href="#">Home</a>
                |
                <a href="http://localhost/miniproject/register1.php">Register</a>
                |
                <a href="http://localhost/miniproject/Locate.php">Locate</a>
                |
                <a href="#footer">Contact</a>
            </p>
        
            <p class="footer-company-name">© 2022 Travel Free of Emission Pvt. Ltd.</p>
        </div>
        
        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                  <p><span>Gandipet, Hyderabad, Telangana,
                            PIN : 500075</span>
                    </p>
            </div>
        
            <div>
                <i class="fa fa-phone"></i>
                <p>+91 999999999</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="#">tfoeofficial@gmail.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>
                We provide services to our customers with recharge points , provide the facility to find the nearest located recharge point of our company with help of Googlemaps and help them in giving suggestions while purchasing an electric car</p>
            <div class="footer-icons">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAb1BMVEU6VZ////82Up4zUJ1UbKx4ibswTpyMmsQ5V6EtTJupss8nSJnN0+WVosgqSpo4U56eqcyDksDj5vBwgbb3+PxFXqNabqt9jb3S2OhidbC9xdy3v9l0hLjZ3etLY6bq7fTEyt4dQpdJYqekrs2uttK97JEgAAADFUlEQVR4nO3c2XLiMBBAUUZmM3IsFsNgSIAk/P83TsLzjCNbI3c3de9rqlw+BV7VZDIhIiIiIiIiIiIiIiIiIlJeCM4VxbzsrJDey8G50s/3h91ss3jp7LdJYii8262rbfPr545eem/753y9qWJwjypzwqJuT7E6i0JX7459fOaEvn3r5zMmLPy5r8+W0L9Gn15MCkO9GuAzJHSh9xFoS1hcrsOAVoTzdsghaEhYTAcDbQjdfjjQhDAshx6DRoShrhKAFoR+nQI0ICzaJKABYZlyEFoQ1p9pQPVCd0m4UJgQ+lsiULvQXVKB2oW+1ysZg8KwTAYqF5ZpF3sDQr99cqFLvJ3RL0y+2usXDnw1Y0YYUh58TQiL3X8Aql57Kvschs3xdF/9pftC8fphj3vSalZ6X5tbA/axJ5rtzhdBem+HVEeeaKq55s+po1DHAW/vJj+/yfdifdxX1OYX9LuwjxIejH5Fv3LTGOBJ8eXup+KEH056P4cXJby+S+9mQlHCUy29mwlFCddz6d1MKEq4sXsmjRTOEGoOIUL9IUSoP4QI9YcQof4QItQfQoT6Q4hQR27+78qYucRX37GFR7Jrb65ddBQz1Hbv2sCjpSixvEcgEitlhcN+cNenRnZxagThm+wK6ghC4TXiEYSr8tmFwstvIwhb2XX+EYR72St+fmEj6htDuBW+a8svPArPauQXnp9e+CI8jZJfKP38mF8ofDnML2wuwsOn2YVX6ena7MKt9PRpduHt6YUr6eHM7MKF9HBmduGr9OvU7MKp9BR4bmEjDcwulJ9zzy2U/+1hbqH0s1N+4afsq8QRhPKT/LmFB+kb7+xC6Tua7ELhdacRhOLPTtmFCv7ZQOY14LP4xWISlh2FqFkM17UF8VPpF7Hjb3HTJl2nSwXAzp5jnqYrhAj1hxCh/hAi1B9ChPpDiFB/CBHqDyFC/SFEqD+ECPWHEKH+ECLUH0KE+kOIUH8IEeoPIUL9IUSoP4QI9YcQof4QItQfQoT6Q4hQfwgR6g8hQv0hRKg/hAj1hxCh/hAi1B9ChD36A+1ASVvVoq0WAAAAAElFTkSuQmCC" alt="" class="fa fa-facebook">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1024px-Instagram_icon.png" alt="" class="fa fa-insta">
                <img src="data:image/png;base64,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" alt="" class="fa fa-twitter">
                <img src="data:image/png;base64,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 " alt="" class="fa fa-facebook">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAbFBMVEUCdLP///8Aa6/G2+q30uUAcrIqg7sAbrHp8/hBjsAAb7EAaK2Yv9p+rNDa6/MAcLGvzeIAd7W/1+j4/P7P4u6CsdNupcxjn8mlxt/f7PR1qs/n8feOuNdRlcQ2iL7w+PtYmcYif7moyN9GkMF7pxAZAAAGNklEQVR4nO3d25KiMBAGYBKMKDgGRBAFRdf3f8dF5+QB6cZxNt1s/1VbNReL8lWEhJzw1FXKpc89y/Ka5H3/mcb7RA8hyT5OW4R1ZrX1hpFGUqW3wtgExvWJvTAm8EbXwk3k+pxenmhzKdxr1+fzC9H7b2E+RGBDzD+FxfB+ou+JindhOah7zGVMUJ6Fq9D1mfxawtVJWA7zInyPLhvhLHB9Gr+YYNYId0NpybTF7pRXh0O9z5xiwtqbD/kybC7EuecPXOh7i4ELF95o4MKRCLlHhPwjQv4RIf+IkH9EyD+9hSYMAx2Els1Tcz+h1eEur4q4qPKx1jyQfYSh3o/qrzGrSXxkMVSFF5robXI98qjWq4h+OaKFerpW91keyHcmY4VR1uI7DRuvqN+JkcLzCEd7MuJEnLADqFRFe+AKJdRVB1CpnPSoAEZot51ApcaUaw2E0OjbWuI2S8qXIkIYzACgUhvChQgLjUlB4YRwIcLC8EFNeJUV3UKEhXqOEBIe3YGFCQKoUo9sAxUU2hwjVFu+wqCrOfOdimwLHBTqBUoYk70QQWG0RAnp3mpgIeZWSrlZ86oyZCzUPkpIt0sSFsYoYUH2CQquDzGNtuYZkW9tYaco4Zhvje8F0NPhKWuylyGm5f0HISQ8vRHxfLhDCJN/dLpPBPGMj2i3/aH7I0X104whYEq4CFF9bRrqqNmQrSo8bH9pd8uNbnvmFJTQ2K4aY057IBHXq28Pj4lzQxqIHZkx3qMf6oL6ahTs6JrR7b0ZFelr8BT0CKnR0/tiXIzJA/uM49vouLjs/q7jMYNB7n5zMYxOVoVf1mm99mdbQ/se+pm+82lsoCMdNv8C4rfQr8icKP4RIf+IkH9EyD8idBXTNJle02oiJzTndmFgzTixpz+bNqL9EZWU0FgdHFazxbz+eIZpmvjLUbUa24b57IdihCYA0t7VBhx0d8pWm1Vc3j2Dnh/UltVUPznnGtNfeihm3anavvsAHLS9PiiMjnHn5KtJsdPPrKt/SY9w3TJqAY5ZzS5L3uocMZo+39yX/L8RTn4oNNG2bRJ52zflUV8jBWGY4Ga0nDPf9bwxuheaKIcnP16m56xr50KDnChwEb9X/ehaaBLcbJarlH3mCToW2gQzhn5PPOCJboXmUAP/6xERX4pOhcZ7qgRPmaM7o10KDTAu2ZkYe0d1KAz630UvkyOrfofCaPUToEqRy1jdCSvdr6K/C3LSrjthBi9UAYLbo8yd8Ml64iI+6mbjTviCoAqRtRB1JbIWoqbT8RZmiMlYvIWY+fO8hQrxjMFc+AbfTZkLEUt1mAvTwQvVFPyZ0hKmTfodkbERpn61PySB1mEyzRZ4JmL6LwnhMjf6Y9si41mrw7uNYh4FXuhBQVhuo5shFxMCG1V8BV6ATEBYtA2bGX3E/VR39IXZg16zEPcB4E4AzoXZw8fYANWPAy6xdi1cdDynRyP4eHi5jmNh3VkCBvEJYLvNsbB7YeaD2fNXAfdbdytcd/clwd/cfDfUHeVWCO1rg+j2B9veToUpNLcCs3MMVOU7FcIzeRA/U6g3yqkQXgCu4X5jaI21UyHcy4K4EI/QtexQiFgAjqgvoJ1xXAoRr52wb6yFM7g/1+7BT4Ga3i6FiFFcxFJ5ykK4FwlTXVAWIsZVjAd+CmUhYrYoYsM/aKm8Q2GK2UsjBLuk3ugKa8z4JmthiRmGh/eOISwEHg4HIJyLUIQiFKEIRShCEYpQhCIUoQhFKEIRilCEIhShCEUoQhGKUIQiFKEIRShCEYpQhCIUoQhFKEIRilCEIhShCEX4pLBtVb09QkehViOE4CJSaEcz1JsDxlDaDkrAozC7cxrwU5Kfrz88v2yiOy88qvenvGBvE+YRIf+IkH9EyD8i5B8R8o8I+UeE/NMIEbsNc472/wMhYrsmztFrL+XyDvGnYkzqqeOghUflqWLIP1NdNMI6GG4hmrBuhCrD7PbDM0GmTsLa9Xn8YtKzUI36vTSRT6LT2zHP+4X1fC8kl0Tnfc/fd0TLh0iMcvUtbEpxaDdUE33sXP+5q90iGVa1qBNfXQtVWpknXwxNL1Z71ddufRc7E6bxPtFDSLIfXexGeLP3Yrn0uWd58/ryv5KollP4mtphAAAAAElFTkSuQmCC" alt="" class="fa fa-facebook">
        
            
            </div>
        </div>
        </footer>
        
    </body>