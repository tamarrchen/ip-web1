<?php
session_start();
include("config.php");

if(isset($_POST['az']))
{
        $id=$_SESSION['idosobe'];

        $ime = $_POST['imep'];
        $prezime = $_POST['prezimep'];
        $tel = $_POST['telefonp'];
        $email = $_POST['emailp'];
        $lozinka = $_POST['pswp'];
        $licnibr = $_POST['licnibrojp'];
        
#kriptovanje lozinke
$opcije = ['cost' => 10];
$sifrovanaLozinka = password_hash($lozinka, PASSWORD_DEFAULT, $opcije);
$sql = "UPDATE medicinari SET Ime='$ime',Prezime='$prezime', LicniBroj='$licnibr', Telefon='$tel', Email='$email', Sifra='$sifrovanaLozinka' WHERE IDMedicinara='$id';";
$conn->query($sql);

}
header("Location:az_lp_m.html");
#raskidanje veze sa serverom
$conn->close();
?>