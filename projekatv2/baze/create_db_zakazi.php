<!-- u bazi podataka raspored kreiramo tabelu zakazivanja -->

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
$sql = "CREATE TABLE IF NOT EXISTS Zakazi(
        IDZakazivanja INTEGER PRIMARY KEY AUTO_INCREMENT,
        IDPacijenta INTEGER REFERENCES pacijenti (IDpacijenta), 
        IDMedicinara INTEGER REFERENCES Medicinari (IDMedicinara),
        IdentifikatorKorone CHAR(2),
        Temperatura FLOAT,
        BrojDanaTemp INTEGER,
        Simptomi VARCHAR(50),
        DatumZakazivanja VARCHAR(50));";
#provera da li je tabela kreirana
if ($conn->query($sql) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}
#raskidanje veze sa serverom
$conn->close();
?>