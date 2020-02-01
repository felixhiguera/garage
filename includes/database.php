<?php //call the configurationcon in order to bring the values from the variables
include ("configurationcon.php");
$conexion =new mysqli($server,$user,$pass,$bd);
if(mysqli_connect_errno()){
    echo"no connected ",mysqli_connect_error();
    exit();

}
else{
    //echo"connected";
}

?>