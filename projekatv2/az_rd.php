<?php 
session_start();


include("config.php");
$dan1= $_POST['radnidan1'];
$dan2= $_POST['radnidan2'];
if($dan2 >= $dan1){
    $dan = $dan1;

    while($dan <= $dan2){

    $diw = date("D",strtotime($dan)); 
    $sql= "DELETE FROM kalendar WHERE Datum='$dan'"; 
    $conn->query($sql);
    $dan = date('Y-m-d', strtotime('+1 day', strtotime($dan)));

    }
}
header("Location:az_kalendar_a");

$conn->close();



?>