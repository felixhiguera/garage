<?php
//conexion with the database 
    require '../includes/database.php';
    session_start();

   //it shows the name of the user logged in the navbar
     $iduser=$_SESSION['id_user'];
     if(!isset($_SESSION['id_user'])){ //if login in session is not set
        header("Location: ../login.php");
    }

     
       $sql="SELECT idUser, nameU FROM users WHERE idUser = '$iduser'";
       $result=$conexion->query($sql);
       
       $row=$result->fetch_assoc();
       


    //read from the database( it shows the content from the database to the page)
    $infousers = "SELECT idUser, nameU,vehicleModel,licence,email  FROM users WHERE idUser = $iduser" ;
    
    
    // print_r($resultappointment);
    $resultinfousers= $conexion ->query($infousers);
   
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-car"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>ger`s garage</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="service.php"><i class="fas fa-tachometer-alt"></i><span>Service details</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper"><div id="content">
    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            
            <ul class="nav navbar-nav flex-nowrap ml-auto">
               
               
                <div class="d-none d-sm-block topbar-divider"></div>
                <li role="presentation" class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow"><a data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle nav-link" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">

                        <?php echo utf8_decode($row['nameU']);?> 

                        </span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg" /></a>
                        <div
                            role="menu" class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a role="presentation" class="dropdown-item" href="cardetails.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Car details</a><a role="presentation" class="dropdown-item" href="service.php"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Service details</a>
                            
                                <div class="dropdown-divider"></div><a role="presentation" class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a></div>
        </div>
        </li>
        </ul>
</div>
</nav>
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="makeapp.php"><i class="fas fa-download fa-sm text-white-50"></i> Make an appoinment</a></div>
</div>
<div class="jumbotron">
    <div class="container">
    <h3 align="center">Details of the profile</h3>
    <!-- <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
    Codigo:<input type="text" name="cod" placeholder="CD101" required>
    Asignatura: <input type="text" name="nom" placeholder="Programacion" required>
    Nota:<input type="number" name="nota" placeholder="99" required>
    <input type="submit" name="guardar" value="Guardar" class="btn btn-primary" >
    </form> -->
    <hr>
    <h4 align="center"></h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>email</th>
                <th>Name</th>
                <th>Car</th>
                <th>Licence</th>

              
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    while($regusers = $resultinfousers ->fetch_array(MYSQLI_BOTH)){
                        echo"<tr>
                                <td>".$regusers['idUser']."</td>
                                <td>".$regusers['email']."</td>
                                <td>".$regusers['nameU']."</td>
                                <td>".$regusers['vehicleModel']."</td>
                                <td>".$regusers['licence']."</td>
                               
                             
                            </tr>";
                    }
                   

                ?>
        </tbody>
    </table>
    
    
    </div>
</div>
 <!-- <td>".$regusers['service']."</td>
                                 <td><a href='editarasignatura.php?id=".$regusers['item']."'>item</a></td>
                                 <td><a href='eliminarasignatura.php?id=".$regusers['total']."'>total</a></td> -->
    
       
<footer></footer>
</div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>



</html>