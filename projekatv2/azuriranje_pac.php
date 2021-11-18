<?php 
#inicijalizacija sesije
session_start();

include("config.php");
$id= $_SESSION['idosobe'];




if(isset($_POST['az_pac'])){
    $ime = $_POST['imep'];
    $prezime = $_POST['prezimep'];
    $tel = $_POST['telefonp'];
    $email = $_POST['emailp'];
    $lozinka = $_POST['pswp'];
    $licnibr = $_POST['licnibrojp'];
#kriptovanje lozinke
    $opcije = ['cost' => 10];
    $sifrovanaLozinka = password_hash($lozinka, PASSWORD_DEFAULT, $opcije);
    $sql = "UPDATE pacijenti SET Ime='$ime',Prezime='$prezime', LicniBroj='$licnibr', Telefon='$tel', Email='$email', Sifra='$sifrovanaLozinka' WHERE IDpacijenta=$id;";
    $conn->query($sql);
    if($conn->query($sql)){
        $upit = "SELECT * FROM pacijenti WHERE IDpacijenta=$id";
        $result=$conn->query($upit);
        $podatak= $result->fetch_object();
        $_SESSION['ime']= $podatak->Ime;
        $_SESSION['prezime']= $podatak->Prezime;
        $_SESSION['licnibroj']= $podatak->LiCniBroj;
        $_SESSION['telefon']= $podatak->Telefon;
        $_SESSION['email']= $podatak->Email;
        $_SESSION['lozinka']= $podatak->Sifra;
    }
    header("Location:az_lp_p.html");
}


#raskidanje veze sa serverom
$conn->close();
?>