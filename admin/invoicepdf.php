<?php
     //template for the pdf format
    require ('fpdf17/fpdf.php');
    //conexion with the database
    $conexion =mysqli_connect('localhost','root','');
    mysqli_select_db($conexion,'loginsystem');
    //get invoices data
    $query = mysqli_query($conexion, "select * from appointment where idAppointment = '".$_GET['idAppointment']."'");

    //query to bring the data from the users in order to show the Users data in the invoice pdf
    $querytwo = mysqli_query($conexion, "SELECT * FROM users INNER JOIN appointment on appointment.idUser = users.idUser AND appointment.idAppointment = '".$_GET['idAppointment']."'");

    //query to bring the data from the service in order to show the service data in the invoice pdf
    $querytree = mysqli_query($conexion, "SELECT * FROM service INNER JOIN appointment on service.idService = appointment.idService AND idAppointment = '".$_GET['idAppointment']."'");

    //query to bring the data from the item in order to show the item data in the invoice pdf
    $queryfour =  mysqli_query($conexion, "SELECT * FROM item INNER JOIN appointment on item.idItem = appointment.idItem AND idAppointment = '".$_GET['idAppointment']."'");

    //the date of today storaged in the variable today
    $today = date("j, n, Y");

    $appointmentinfo = mysqli_fetch_array($query);
    $usersinfo = mysqli_fetch_array($querytwo);
    $servicesinfo = mysqli_fetch_array($querytree);
    $iteminfo = mysqli_fetch_array($queryfour);

    $pdf = new FPDF('P','mm','A4');

    $pdf->AddPage();
    //set font to arial, bold, 14pt
    $pdf ->SetFont('arial','B',14);

    //Cell(width, height, text, border, end line, [align])
    $pdf ->Cell(130, 5,'Ger`s Garage',0,0);
    $pdf ->Cell(59,5,'INVOICE',0,1);//end of the line

    //set font to arial, regular, 12pt
    $pdf ->SetFont('Arial','',12);

    $pdf ->Cell(130 ,5,'Parnel Street',0,0);
    $pdf ->Cell(59  ,5,'',0,1);//end of line

    $pdf ->Cell(130 ,5,'Dublin,Ireland, D07XY45',0,0);
    $pdf ->Cell(25  ,5,'Date',0,0);
    $pdf ->Cell(34  ,5,$today,0,1);//end of line

    $pdf ->Cell(130 ,5,'phone[+12345678]',0,0);
    $pdf ->Cell(25  ,5,'Invoice #',0,0);
    $pdf ->Cell(34  ,5,$appointmentinfo['idAppointment'],0,1);//end of line

    $pdf ->Cell(130 ,5,'Fax [+12345678]',0,0);
    $pdf ->Cell(25  ,5,'Customer ID',0,0);
    $pdf ->Cell(34  ,5,$appointmentinfo['idUser'],0,1);//end of line

    //make a dummy empty cell as a vertifcal spacer
    $pdf->Cell(189,10,'',0,1);//end of line

    //billing address
    $pdf->Cell(100,10,'Bill to',0,1);//End of line

    //add dummy cell at beginning of each line for indentation
    $pdf ->cell(10, 5,'',0,0);
    $pdf ->cell(90 , 5,$usersinfo['nameU'],0,1);

    $pdf ->cell(10, 5,'',0,0);
    $pdf ->cell(90 , 5,$usersinfo['vehicleModel'],0,1);

    $pdf ->cell(10, 5,'',0,0);
    $pdf ->cell(90 , 5,$usersinfo['email'],0,1);

    $pdf ->cell(10, 5,'',0,0);
    $pdf ->cell(90 , 5,$usersinfo['phone'],0,1);

    $pdf ->cell(10, 5,'',0,0);
    $pdf ->cell(90 , 5,$usersinfo['licence'],0,1);

    //make a dummy empty cell as a vertical spacer
    $pdf ->Cell(189, 10, '',0 ,1); //end of line

    //invoice contents
    $pdf->SetFont('Arial','B',12);

    $pdf ->Cell(130, 10, 'Description',1 ,0); 
    $pdf ->Cell(25, 10, 'Taxable',1 ,0); 
    $pdf ->Cell(34, 10, 'Amount',1 ,1); //end of line

    $pdf->SetFont('Arial','',12);

    //numbers are right-aligned so we give 'R' after new line parameter
    $pdf ->Cell(130, 5, $servicesinfo['typeService'],1 ,0); 
    $pdf ->Cell(25, 5, '-',1 ,0); 
    $pdf ->Cell(34, 5, $servicesinfo['price'],1 ,1,'R'); //end of line

    $pdf ->Cell(130, 5,$iteminfo['descriptionItem'],1 ,0); 
    $pdf ->Cell(25, 5, '-',1 ,0); 
    $pdf ->Cell(34, 5, $iteminfo['costItem'],1 ,1,'R'); //end of line

    //summary

    $pdf ->Cell(130, 5, '',0 ,0); 
    $pdf ->Cell(25, 5, 'Total Due',0 ,0); 
    $pdf ->Cell(4, 5, '$',1 ,0); 
    $pdf ->Cell(30, 5,(int)$servicesinfo['price']+(int)$iteminfo['costItem'],1 ,1,'R'); //end of line


    $pdf ->Output();
    ?>