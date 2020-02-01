<?php //this page is not used, it was made in order to receive the idAppointment and make the invoice in the invoicepdf.php  (testing) 
    require '../includes/database.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Generator</title>
</head>
<body>
    select invoice:
    <form  method='get' action='invoicepdf.php'>
    <select name='idAppointment'>
        <?php
        //show id appointments list as options
        $query = mysqli_query($conexion, "SELECT * FROM appointment"); 
        
        while($invoice = mysqli_fetch_array($query)){
            echo "<option value='".$invoice['idAppointment']."'>".$invoice['idAppointment']."</option>";
                }
            ?>
        </select>
        <input type='submit' value='generate' target="_blank">
    </form>

    
</body>
</html>