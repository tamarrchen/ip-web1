<?php 

include("config.php");
if(isset($_POST['unos'])){
    $ime = $_POST['imem'];
    $prezime = $_POST['prezimem'];
    $tel = $_POST['telefonm'];
    $email = $_POST['emailm'];
    $lozinka = $_POST['pswm'];
    $licnibr = $_POST['licnibrojm'];
    $brpac = $_POST['pacijentim'];
    $dod = $_POST['datumod'];
    $ddo = $_POST['datumdo'];
    $od = $_POST['radnovremeod'];
    $do = $_POST['radnovremedo'];
    $kov = $_POST['kovcentar'];
    $rv = $od . "-" . $do;
#kriptovanje lozinke
    $opcije = ['cost' => 10];
    $sifrovanaLozinka = password_hash($lozinka, PASSWORD_DEFAULT, $opcije);
#unos podataka
$sql = "INSERT INTO medicinari (Ime, Prezime, LicniBroj, Telefon, Email, Sifra, BrojPacijenata, RadnoVremeOd, RadnoVremeDo, DatumOd, DatumDo, KovidCentar) VALUES ('$ime','$prezime','$licnibr','$tel','$email','$sifrovanaLozinka','$brpac', '$od', '$do', '$dod','$ddo', '$kov');";
$conn->query($sql);
$id = $conn->insert_id;
//echo $id;



if($dod <= $ddo){
    $dan = $dod;


    while($dan <= $ddo){
    

    $sql1= "SELECT * FROM kalendar WHERE Datum='$dan'; ";
    $s1 = $conn->query($sql1);
    if($conn->query($sql1)==TRUE){
        
        $diw = date("D",strtotime($dan)); 
        $red= $s1->fetch_assoc();
        $f=$red['Datum'];
        if($f==$dan){
        $polje = $red['RadnoVreme'];
        echo $diw . $polje;
        $vr=preg_split("/-/",$polje);
        $vr0=$vr[0];
        $vr1=$vr[1];
        

        if($od<$vr1){
        if($vr0<"12 PM"){
             $kad="1";}
             if($vr0>"12 PM") {
                $kad="2";}
             if($vr0>= $od) {
                 $vremeod=$vr0;
                }
                else $vremeod=$od;
            if($vr1>=$do){
                $vremedo=$do;
            }
            else $vremedo=$vr1;
            
        
        $rvm = $vremeod . "-" . $vremedo;

        
        $sql2= "INSERT INTO kalendar (IDMedicinara, Dan, Datum, RadnoVreme, PrePosle) VALUES('$id','$diw','$dan','$rvm','$kad');";
        if ($conn->query($sql2) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
            
    }}
    $dan = date('Y-m-d', strtotime('+1 day', strtotime($dan)));
}

//if ($t === TRUE) {
//    $id = $conn->insert_id;}
//$sql1 = "INSERT INTO kalendar (IDMedicinara, RadnoVreme) VALUES ('$id','$rv')";
//$conn->query($sql1);
}}
header("Location:medicinar.html");
#zatvaranje konekcije
$conn->close();
?>