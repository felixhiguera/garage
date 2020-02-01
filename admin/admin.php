<?php
    session_start();
    require '../includes/database.php';
     
  //read from the database( it shows the content from the database to the page)
   //this query is made it in order to call the different data from the tables service,item, users and mechanic
    $infoprofile = "SELECT * FROM appointment 
    INNER JOIN users ON appointment.idUser = users.idUser 
    LEFT JOIN service ON appointment.idService = service.IdService 
    LEFT JOIN item ON appointment.idItem = item.idItem
    LEFT JOIN mechanic ON appointment.idMechanic = mechanic.idMechanic";
    
    $resultprofile = $conexion ->query($infoprofile);
    
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
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper"><div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <ul class="nav navbar-nav flex-nowrap ml-auto">
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li role="presentation" class="nav-item dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow"><a data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle nav-link" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Admin</span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg" /></a>
                            <div
                                role="menu" class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                               
                                        <div class="dropdown-divider"></div><a role="presentation" class="dropdown-item" href="../index.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard</h3></div>
                </div>
                <div class="jumbotron">
                    <div class="container">
                    <h3 align="center">Information about Users</h3>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Car</th>
                                <th>Id Appointment</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Items</th>
                                <th>Mechanic</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                                while ($regusers = $resultprofile ->fetch_array(MYSQLI_BOTH)){
                                    echo"<tr>
                                            <td>".$regusers['idUser']."</td>
                                            <td>".$regusers['nameU']."</td>
                                            <td>".$regusers['vehicleModel']."</td>
                                            <td>".$regusers['idAppointment']."</td>
                                            <td>".$regusers['typeService']."</td>
                                            <td>".$regusers['date']."</td>
                                            <td><a href=status.php?id=".$regusers['idAppointment'].">".$regusers['status']."</td>
                                            <td><a href=item.php?id=".$regusers['idAppointment'].">".$regusers['descriptionItem']."</td>
                                            <td><a href=mechanic.php?id=".$regusers['idAppointment'].">".$regusers['nameMechanic']."</td>
                                            <td><a target=_blank rel=noopener noreferrer href=invoicepdf.php?idAppointment=".$regusers['idAppointment'].">Invoice</td>
                                        </tr>";
                                }
                                
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
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