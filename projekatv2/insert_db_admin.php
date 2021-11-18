<!-- unos podataka o administratorima -->

<?php 

include("config.php");

    $lozinka1 = "tamara";
    $lozinka2 = "nikola";
    $lozinka3 = "profesorka";
#kriptovanje lozinke
    $opcije = ['cost' => 10];
    $sifrovanaLozinka1 = password_hash($lozinka1, PASSWORD_DEFAULT, $opcije);
    $sifrovanaLozinka2 = password_hash($lozinka2, PASSWORD_DEFAULT, $opcije);
    $sifrovanaLozinka3 = password_hash($lozinka3, PASSWORD_DEFAULT, $opcije);
#unos podataka
$sql = "INSERT INTO Admini (Ime, Prezime, Email, Lozinka) VALUES ('Tamara','Jovanovic','jt170158d@student.etf.bg.ac.rs','$sifrovanaLozinka1'), ('Nikola','Urosevic','un170400d@student.etf.bg.ac.rs','$sifrovanaLozinka2'), ('Aleksandra','Smiljanic','aleksandra@etf.bg.ac.rs','$sifrovanaLozinka3');";
#provera unosa
if($conn->query($sql)==TRUE){
    echo "New record created successfully";
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

#zatvaranje konekcije
$conn->close();
?>