<?php 
session_start();


include("config.php");
    $dan1 = $_POST['radnidan1'];
    $dan2=$_POST['radnidan2'];
    $vremeod=$_POST['vremeod'];
    $vremedo=$_POST['vremedo'];
    $radnovreme= $vremeod."-".$vremedo;



    if($dan2 >= $dan1){
        $dan = $dan1;

        while($dan <= $dan2){

            $sql= "UPDATE kalendar SET RadnoVreme='$radnovreme' WHERE Datum='$dan' "; 
            $conn->query($sql);
            if($conn->query($sql)) echo "done ". $dan. "  ";
            $dan = date('Y-m-d', strtotime('+1 day', strtotime($dan)));
    
        }
}
header("Location:az_kalendar_a.html");

$conn->close();



?>