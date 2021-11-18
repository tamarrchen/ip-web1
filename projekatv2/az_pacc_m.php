<?php
session_start();
include("config.php");

if(isset($_POST['az']))
{
    if(isset($_POST['pac'])){
        $id=$_POST['pac'];
        $_SESSION['idp']= $id;
        $upit = "SELECT * FROM pacijenti WHERE IDpacijenta=$id";
        $result=$conn->query($upit);
        $podatak= $result->fetch_object();
        $_SESSION['imep']= $podatak->Ime;
        $_SESSION['prezimep']= $podatak->Prezime;

        header("Location:az_pac_m0.html");
        
    }
    else header("Location:az_pac_m.html");


}
if(isset($_POST['az1']))
{
         $id=$_SESSION['idp'];
        $ime = $_POST['im'];
        $prezime = $_POST['pr'];
        $dolazak = $_POST['dolazak'];
        $nedol = $_POST['ned'];
        if($dolazak=="nije_dosao") $nedolazak = $nedol + 1; else $nedolazak=$nedol;
        $upit = "UPDATE pacijenti SET Ime='$ime', Prezime='$prezime', BrojNedolazaka='$nedolazak'  WHERE IDPacijenta='$id';";
        $conn->query($upit);
        if ($conn->query($upit) === TRUE) {
            header("Location:az_pac_m0.html");
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $conn->error;
          }
}
if(isset($_POST['br'])){
    $id = $_POST['pac'];
    $upit = "DELETE FROM pacijenti WHERE IDpacijenta=$id";
    $conn->query($upit);
    header("Location:az_pac_m.html");
    
      

}
$conn->close();


?>