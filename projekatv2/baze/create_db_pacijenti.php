<!-- u bazi podataka raspored kreiramo tabelu pacijenti -->

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
$sql = "CREATE TABLE IF NOT EXISTS Pacijenti(
    IDpacijenta INTEGER PRIMARY KEY AUTO_INCREMENT,
    Ime VARCHAR(30),
    Prezime VARCHAR(30),
    Telefon VARCHAR(30),
    Email VARCHAR(50),
    Sifra VARCHAR(100),
    LiCniBroj VARCHAR(20),
    ListaIDMedicinara VARCHAR(50),
    Karton VARCHAR(50),
    Opis VARCHAR(50),
    BrojNedolazaka INTEGER)";
#provera da li je tabela kreirana
if ($conn->query($sql) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}
#raskidanje veze sa serverom
$conn->close();
?>