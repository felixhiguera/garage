<?php
    session_start();
    require 'includes/database.php';
    //take the values from the textboxs in the login, save it in variables and make the query to find the email with the password 
    if(!empty($_POST)){
        $email = mysqli_real_escape_string($conexion,$_POST['email']);
        $password = mysqli_real_escape_string($conexion,$_POST['password']);
        $encrypted_password=sha1($password);
        $sql="SELECT idUser FROM users WHERE email ='$email' AND passwordU ='$encrypted_password'";
        $result = $conexion->query($sql);
        $rows=$result->num_rows;
        if($rows>0){
            $row=$result->fetch_assoc();
            $_SESSION['id_user']=$row['idUser'];
            header("Location:admin/profile.php");
        }else{
            echo"<script> alert('password incorrect');
            window.location='login.php'; 
                </script>";
        }

    }

    ?>
    
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ger´s Garage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Projects-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="index.php">Ger´s Garage</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="aboutus.php">About Us</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="signup.php">Sign Up</a></li>
                    <li class="nav-item "><a class="nav-link"  aria-expanded="false" href="typeservice.php">Services</a>
                       
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-info btn-block" type="submit">Log In</button></div><a class="forgot" href="#">Forgot your email or password?</a></form>
    </div>
    <div class="footer-basic">
        <footer>
           
            <p class="copyright">Company Name © 2017</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>