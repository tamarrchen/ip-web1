<!-- u bazi podataka raspored kreiramo tabelu kalendar -->

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
$sql = "CREATE TABLE IF NOT EXISTS Kalendar (
        IDDatum INTEGER PRIMARY KEY AUTO_INCREMENT,
        IDMedicinara VARCHAR(200),
        Dan VARCHAR(20),
        PrePosle INTEGER,
        RadnoVreme VARCHAR(30), 
        RasporedpoTerminima VARCHAR(20),
        Datum DATE);";
#provera da li je tabela kreirana
if ($conn->query($sql) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}
#raskidanje veze sa serverom
$conn->close();
?>