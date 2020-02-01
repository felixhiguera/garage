<?php
    require 'includes/database.php';

    //take the values from the textboxs, save it in the variables 
    if(!empty($_POST)){
        $name= mysqli_real_escape_string($conexion,$_POST['name']);
        $email=mysqli_real_escape_string($conexion,$_POST['email']);
        $phone=mysqli_real_escape_string($conexion,$_POST['phone']);
        $password=mysqli_real_escape_string($conexion,$_POST['password']);
        $licence=mysqli_real_escape_string($conexion,$_POST['licence']);
        $engine=mysqli_real_escape_string($conexion,$_POST['vehicle_engine']);
        $model=mysqli_real_escape_string($conexion,$_POST['vehicle_model']);
        $encrypted_password=sha1($password);

        $sqlemail="SELECT idUser FROM users where email ='$email'";
        $resultemail=$conexion->query($sqlemail);
        $row=$resultemail->num_rows;
        // if it find the value in email from the database, it wont be registered
        if($row>0){
            echo"<script> alert('the user already exist!');
            window.location='signup.php';
            </script>";
        }else{// in case that there are not data with the same information, it will be registered
            $sqluser = "INSERT INTO users(email, nameU, phone, passwordU,licence,vehicleEngine,vehicleModel) VALUES('$email','$name','$phone','$encrypted_password','$licence','$engine','$model')";
            $resultuser=$conexion->query($sqluser);
            print_r($resultuser);
                if($resultuser>0){
                    echo"<script> alert('successfully registered');
                window.location='index.php';
                </script>";
                    }   else{
                    echo"<script> alert('Error!');
                   
                    </script>";
                    
                }
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
                   
                    <li class="nav-item" role="presentation"><a class="nav-link" href="aboutus.php">About Us</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item "><a class=" nav-link"  href="typeservice.php">Services</a>
                       
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="signup.php" method="post">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <input class="form-control" type="email" name="email" placeholder="Email">
                <input class="form-control" type="text" name="name" placeholder="Customer name">
                <input class="form-control" type="text" name="phone" placeholder="phone number">
                <input class="form-control" type="password" name="password" placeholder="Password">
                <input class="form-control" type="text" name="licence" placeholder="ID licence">
                <label for="exampleFormControlSelect1">Vehicle engine</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="vehicle_engine">
                        <option>Diesel</option>
                        <option>Petrol</option>
                        <option>Hibrid</option>
                        <option>Electric</option>
                    </select>
                <label for="exampleFormControlSelect1">Vehicle model</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="vehicle_model">
                        <option>VW GOLF</option>
                        <option>VW PASSAT</option>
                        <option>VW POLO</option>
                        <option>MERCEDES C-CLASS</option>
                        <option>SKODA OCTAVIA</option>
                        <option>AUDI A3, S3, RS3</option>
                        <option>OPEL ASTRA</option>
                        <option>OPEL CORSA</option>
                        <option>AUDI A4, S4, RS4</option>
                        <option>FORD FOCUS</option>
                        <option>BMW 1 Series</option>
                        <option>FORD FIESTA</option>
                        <option>SKODA FABIA</option>
                        <option>BMW 3 Series</option>
                        <option>AUDI A6, S6, RS6</option>
                        <option>BMW 2 Series</option>
                        <option>SEAT LEON</option>
                        <option>MINI</option>
                        <option>VW UP</option>
                        <option>VW TOURAN</option>
                        <option>MERCEDES B-CLASS</option>
                        <option>FIAT 500</option>
                        <option>VW TRANSPORTER</option>
                        <option>BMW 5 Series</option>
                        <option>MERCEDES A-CLASS</option>
                        <option>OPEL MOKKA</option>
                        <option>MERCEDES E-CLASS</option>
                        <option>FORD KUGA</option>
                        <option>NISSAN QASHQAI</option>
                        <option>VW TIGUAN</option>
                    </select>            
                <div class="form-group"><button class="btn btn-info btn-block" type="submit" name="signup-submit">Sign Up</button></div><a class="already" href="login.php">You already have an account? Login here.</a></form>
            </div>
         </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>