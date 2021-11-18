<?php 
#inicijalizacija sesije
session_start();

#povezivanje sa serverom
$servername = "localhost";
$username = "root";
$password = "";
$baza ="raspored";
$conn = new mysqli($servername, $username, $password, $baza);
$flag=0;
#provera konekcije sa serverom
if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}
if(isset($_POST['akcija']))
{
    $email = $_POST['mail'];
    $lozinka = $_POST['psw'];
    $upit1 = "SELECT * FROM admini";
    $upit2 = "SELECT * FROM medicinari";
    $upit3 = "SELECT * FROM pacijenti";
    $rez1 = $conn -> query($upit1);
    $rez2 = $conn -> query($upit2);
    $rez3 = $conn -> query($upit3);
    #proveravamo tabelu admina
    while($red1 = $rez1->fetch_assoc())
    {
        if($red1['Email']=="$email")
        {
            $pass = $red1['Lozinka'];
            if(password_verify($lozinka,$pass))
            {
            $_SESSION['idosobe']= $red1['IDadmin'];
            $_SESSION['privilegije']='admin';
            echo "Ispravna lozinka";
            $flag=1;
            header("Location: admin_navig.html");
            }
            else 
            {
            echo "Neispravna lozinka";
            header ("Location:uloguj_se.html");
            }
        }
    }

    #proveravamo bazu medicinskih radnika
    while($red2 = $rez2->fetch_assoc())
    {
        if($red2['Email']=="$email")
        {
            $pass = $red2['Sifra'];
            if(password_verify($lozinka,$pass))
            {
                $_SESSION['idosobe']= $red2['IDMedicinara'];
                $_SESSION['privilegije']='medicinar';
                echo "Ispravna lozinka";
                $flag=1;
                header("Location: med_navig.html");
            }
            else 
            {
                echo "Neispravna lozinka";
                header ("Location:uloguj_se.html");
            }
        }
    }
    while($red3 = $rez3->fetch_assoc())
    {
        if($red3['Email']=="$email")
        {
            $pass = $red3['Sifra'];
            if(password_verify($lozinka,$pass))
            {
                $_SESSION['idosobe']= $red3['IDpacijenta'];
                $_SESSION['privilegije']='pacijenti';
                $_SESSION['ime']=$red3['Ime'];
                $_SESSION['prezime']=$red3['Prezime'];
                $_SESSION['licnibroj']=$red3['LiCniBroj'];
                $_SESSION['telefon']=$red3['Telefon'];
                $_SESSION['email']=$red3['Email'];
                $_SESSION['lozinka']=$lozinka;
                
                echo "Ispravna lozinka";
                $flag=1;
                header("Location: pacijent_navig.html");
            }
            else 
            {
                echo "Neispravna lozinka";
                header ("Location:uloguj_se.html");
            }
        }
    }
    if($flag == 0) {
    header("Location:uloguj_se.html");
    }
}
echo 10;
#raskidanje veze sa serverom
$conn->close();
?>