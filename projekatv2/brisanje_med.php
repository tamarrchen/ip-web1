<?php 
#inicijalizacija sesije
session_start();
$_SESSION['id']=$_POST['medd'];

#povezivanje sa serverom
$servername = "localhost";
$username = "root";
$password = "";
$baza ="raspored";
$conn = new mysqli($servername, $username, $password, $baza);
#provera konekcije sa serverom
if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}
if(isset($_POST['brisi_med'])){
$id = $_POST['medd'];
$upit = "DELETE FROM medicinari WHERE IDMedicinara=$id";
$conn->query($upit);$_SESSION['idaz']=$id;
header("Location:az_med_a.html");
}
if(isset($_POST['azuriraj_med'])){
    if(isset($_POST['medd'])){
        $id=$_POST['medd'];
        $upit = "SELECT * FROM medicinari WHERE IDMedicinara=$id";
        $result=$conn->query($upit);
        $podatak= $result->fetch_object();
        $_SESSION['ime']= $podatak->Ime;
        $_SESSION['prezime']= $podatak->Prezime;
        $_SESSION['lb']= $podatak->LicniBroj;
        $_SESSION['tel']= $podatak->Telefon;
        $_SESSION['mail']= $podatak->Email;
        $_SESSION['psw']= $podatak->Sifra;
        $_SESSION['bp']= $podatak->BrojPacijenata;
        $_SESSION['dod']=$podatak->DatumOd;
        $_SESSION['ddo']=$podatak->DatumDo;
        $_SESSION['rvod']=$podatak->RadnoVremeOd;
        $_SESSION['rvdo']=$podatak->RadnoVremeDo;
        $_SESSION['cv']=$podatak->KovidCentar;

        header("Location:az_med_a_pom.html");
        
    }
    else header("Location:az_med_a.html");
}
#raskidanje veze sa serverom
$conn->close();
?>