<?php 
session_start();


if(file_exists('vi.txt')==FALSE)
{
  $vi = 1;
  $fajl = fopen('vi.txt', "w");
  fwrite($fajl, $vi);
  fclose($fajl);
  
}
else{

  $fajl = fopen('vi.txt', 'r+');
  $vi= fgets($fajl);
  $vii = $vi + 1;
  fclose($fajl);
  $fajl = fopen('vi.txt', 'w');
  fwrite($fajl, $vii);
  fclose($fajl);
}



include("config.php");

$naslov = $_POST['naslov'];
$sadrzaj = $_POST['tekst'];
$datum = $_POST['datum'];
$vest="vest" . $vi . ".html";
echo $naslov . $sadrzaj . $datum . $vest;
#unos podataka
$sql = "INSERT INTO vesti (LinkVesti, Naslov, Datum, Sadrzaj) VALUES ('$vest', '$naslov','$datum','$sadrzaj');";
$conn->query($sql);

header("Location:vest.html");
#zatvaranje konekcije
$conn->close();
?>