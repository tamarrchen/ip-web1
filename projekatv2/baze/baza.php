<!--pravljenje baze podataka RASPORED: pokretanjem ovog programa brise se stara baza pod istim imenom ukoliko postoji i pravi se nova -->

<?php 
#povezivanje sa serverom
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
#provera konekcije sa serverom
if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}
#pravljenje baze
$sql = "DROP DATABASE IF EXISTS raspored";
$conn->query($sql);
$sql = "CREATE DATABASE IF NOT EXISTS raspored";
if($conn->query($sql)==TRUE){
    echo "Database created successfully";
}
else{
    echo "Error creating database: " . $conn->error; 
}
#zatvaranje konekcije
$conn -> close();
?>