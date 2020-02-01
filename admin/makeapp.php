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
     

    //send the data to the database 
    if(!empty($_POST)){

        $valueService;
        if($_POST['service']=='Annual Service'){
           $service =1; 
        }
        else if($_POST['service']=='Major Service'){
            $service =2;
        }else{
            $service =3;
        }
    


        // $service= mysqli_real_escape_string($conexion,$_POST['service']);
        $date1=mysqli_real_escape_string($conexion,$_POST['date']);
        print_r($date1);
       $date = str_replace('/', '-', $date1);
        $timestamp= strtotime($date);
        print_r($timestamp);
        $newdate = date('Y-m-d',$timestamp); 
        
        
        
        // $date_query = "SELECT COUNT(*) as idService FROM appointment WHERE date = '$date'";
        // $date_query = "SELECT SUM(value) as services FROM appointment WHERE date = '$date'";
        
        // $result_date=$conexion->query($date_query);
        // print_r($result_date);
        // $row = $result_date->fetch_assoc();
       

        // if($row["idService"]>4){
        //     echo"<script> alert('Error that date is fully booked!');
            
        //     </script>";
        //     die();
        // }
            //Update the vehicle data and send to the database
            $sqlservice = "INSERT INTO appointment(idService,date,idUser,status) VALUES($service,'$newdate',$iduser,'booked')";
            print_r($sqlservice);
            $resultservice=$conexion->query($sqlservice);
           
            
                if($resultservice>0){
                    echo"<script> 
                </script>";
                    }   else{
                    echo"<script> alert('Error!');
                   
                    </script>";
                    
                } 
        
            }

    
    
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="profile.php"><i class="fas fa-tachometer-alt"></i><span>Return to the profile</span></a></li>
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
                            role="menu" class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a role="presentation" class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile</a><a role="presentation" class="dropdown-item" href="cardetails.php"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Car details</a>
                            
                                <div class="dropdown-divider"></div><a role="presentation" class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a></div>
        </div>
        </li>
        </ul>
</div>
</nav>
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
    </div>
</div>

<div class="jumbotron">
    <div class="container" id="container">
    <h3 align="center">Service</h3>
    <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
    <label for="exampleFormControlSelect1">Service</label>
    <select class="form-control" id="exampleFormControlSelect1" name="service">
    <option>Annual Service</option>
    <option>Major Service</option>
    <option>Repair</option>
                   
    <input type="text" id="myDate" name ="date" class="form-control">
    
    <input type="submit" name="guardar" value="Save" class="btn btn-primary" >
    </form>
    <hr>
    
    
    
    </div>
</div>
 <!-- <td>".$regusers['service']."</td>
                                 <td><a href='editarasignatura.php?id=".$regusers['item']."'>item</a></td>
                                 <td><a href='eliminarasignatura.php?id=".$regusers['total']."'>total</a></td> -->

</div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> 
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script> -->
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="assets/js/theme.js"></script>

    <?php
    require '../includes/database.php';
   
    // this is for making the filter, if the value of the services are more than 4
    $query = "SELECT DATE_FORMAT(appointment.date, '%d/%m/%Y') as date, SUM(service.value) as weight_date FROM appointment
    INNER JOIN service ON appointment.idService = service.IdService
    GROUP BY appointment.date
    HAVING weight_date > 4";
  
    $result = $conexion->query($query);
    
    $dates_disabled = "[";
    $count = 0;

    while ($row = $result->fetch_array()) {
        $dates_disabled .= "'".$row["date"]."'". ", ";
        $count++;
    }

    if($count>0){
        $dates_disabled = substr($dates_disabled, 0, -2);
    }
    $dates_disabled .= "]";

    echo '
    <script>
        $(document).ready(function(){
            $("#container input").datepicker({
                format: "dd/mm/yyyy",
                weekStart: 1,
                maxViewMode: 1,
                todayBtn: "linked",
                daysOfWeekDisabled: "0",
                daysOfWeekHighlighted: "0",
                todayHighlight: true,   
                datesDisabled: '.$dates_disabled.'
            });
        })
        </script>
    ';
    
    echo $dates_disabled;
    ?>

<!--     <script>
    $(document).ready(function(){
        $("#container input").datepicker({
            format: "dd/mm/yyyy",
            weekStart: 1,
            maxViewMode: 1,
            todayBtn: "linked",
            daysOfWeekDisabled: "0",
            daysOfWeekHighlighted: "0",
            todayHighlight: true,
            datesDisabled:  ['05/01/2020', '21/01/2020']
        });
    })
    </script> -->

    
</body>



</html>