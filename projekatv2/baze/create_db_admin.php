<!--pravljenje tabele koja ce da sadrzi podatke o administratorima -->

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
$sql = "CREATE TABLE IF NOT EXISTS Admini (
        IDadmin INTEGER PRIMARY KEY AUTO_INCREMENT,
        Ime VARCHAR(20),
        Prezime VARCHAR(30),
        Email VARCHAR(50),
        Lozinka VARCHAR(100));";
#provera da li je tabela kreirana
if ($conn->query($sql) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}
#raskidanje veze sa serverom
$conn->close();
?>
