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
if(isset($_POST['dodajp']))
{
    $broj=$_POST['broj'];
    for($i=1; $i<=$broj;$i++){
        $d = 'datum'. $i;
        $p = $_POST[$d];
        echo $p. "</br>";
        $sql = "DELETE FROM kalendar WHERE Datum='$p';";
        $conn->query($sql);
        if($conn->query($sql)==true) echo "uspeh  " . $p . "  ";
    }
    header("Location:kalendar.html");
}

$conn->close();

?>