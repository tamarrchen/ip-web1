<?php 
include("config.php");
    $ime = $_POST['imep'];
    $prezime = $_POST['prezimep'];
    $tel = $_POST['telefonp'];
    $email = $_POST['emailp'];
    $lozinka = $_POST['pswp'];
    $licnibr = $_POST['licnibrojp'];
    if(isset($_POST['karton']))
    {
    $karton = $_POST['kartonp'];
}
    else {
        $karton=NULL;
    }
    if(isset($_POST['lekar']))
    {
        $lekar = $_POST['lekar'];
    }
    else
    {
        $lekar=NULL;
    }
#kriptovanje lozinke
    $opcije = ['cost' => 10];
    $sifrovanaLozinka = password_hash($lozinka, PASSWORD_DEFAULT, $opcije);
#unos podataka
$sql = "INSERT INTO pacijenti (Ime, Prezime, LicniBroj, Telefon, Email, Sifra, Karton,ListaIDMedicinara, BrojNedolazaka) VALUES ('$ime','$prezime','$licnibr','$tel','$email','$sifrovanaLozinka','$karton','$lekar','0');";
#provera unosa
if($conn->query($sql)==TRUE){
    if(isset($_POST['unos0'])) {header("Location:uloguj_se.html"); echo "0";}
    if(isset($_POST['unos1'])) {header("Location:pacijent_a.html"); echo "1";}
    if(isset($_POST['unos2'])){ header("Location:pacijent_m.html"); echo "2";}

} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

#zatvaranje konekcije
$conn->close();
?>