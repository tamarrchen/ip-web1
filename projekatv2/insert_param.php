<?php 
include("config.php");
$par=$_POST['brpac'];
$p = (60 / $par);
$temp=4;

if(file_exists('param.txt')==FALSE){
if(isset($_POST['unos'])){
    $fajl= fopen('param.txt', "w");
    fwrite($fajl, $p . "\n" . $temp);
    fclose($fajl);
    header("Location:param.html");
}}
else{
    $fajl=fopen('param.txt','r+');
    fwrite($fajl, $p . "\n" . $temp);
    fclose($fajl);
    header("Location:param.html");
}
if(isset($_POST['azur'])){
    $fajl=fopen('param.txt','r+');
    fwrite($fajl, $p . "\n" . $temp);
    fclose($fajl);
    header("Location:az_param_a.html");

}


$conn->close();

?>