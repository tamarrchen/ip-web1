<?php 
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
$sql = " CREATE TABLE IF NOT EXISTS Vesti (
         IDVesti INTEGER PRIMARY KEY AUTO_INCREMENT,
         LinkVesti VARCHAR(200) NOT NULL,
         Naslov VARCHAR(200),
         Datum DATE,
         Sadrzaj VARCHAR(4000))";
#provera da li je tabela kreirana
if ($conn->query($sql) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}
#raskidanje veze sa serverom
$conn->close();
?>