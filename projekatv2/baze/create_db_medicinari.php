<!-- u bazi podataka raspored kreiramo tabelu medicinari -->

<?php 
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
#kreiranje tabele
$sql = "CREATE TABLE IF NOT EXISTS Medicinari (
    IDMedicinara INTEGER PRIMARY KEY AUTO_INCREMENT,
    Ime VARCHAR(30),
    Prezime VARCHAR(30),
    Telefon VARCHAR(30),
    Email VARCHAR(50),
    Sifra VARCHAR(100),
    LicniBroj VARCHAR(20),
    Opis VARCHAR(100), 
    Tip VARCHAR(10),
    DatumOd VARCHAR(15),
    DatumDo VARCHAR(15),
    RadnoVremeOd VARCHAR(10),
    RadnoVremeDo VARCHAR(10),
    BrojPacijenata INTEGER,
    KovidCentar CHAR(2));";
#provera da li je tabela kreirana
if ($conn->query($sql) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}
#raskidanje veze sa serverom
$conn->close();
?>