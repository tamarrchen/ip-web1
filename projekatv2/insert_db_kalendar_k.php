<?php 

include("config.php");
if(isset($_POST["kalendar"])){

    $dan1 = $_POST['radnidan1'];
    $dan2=$_POST['radnidan2'];
    $vremeod=$_POST['vremeod'];
    $vremedo=$_POST['vremedo'];
    $radnovreme= $vremeod."-".$vremedo;
    echo $radnovreme. "</br>";
    if($dan2 >= $dan1){
        $dan = $dan1;

        while($dan <= $dan2){

        $diw = date("D",strtotime($dan)); 
        $sql= "INSERT INTO kalendar (IDMedicinara, Dan, RadnoVreme, Datum) VALUES ('0','$diw','$radnovreme','$dan')"; 
        $conn->query($sql);
        $dan = date('Y-m-d', strtotime('+1 day', strtotime($dan)));
    
        }
    header("Location:kalendar.html");
}




}
$conn->close();

?>