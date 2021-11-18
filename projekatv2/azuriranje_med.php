<?php
session_start();

include("config.php");

if(isset($_POST['az'])){
    $id=$_SESSION['id'];
    $ime = $_POST['imem'];
    $prezime = $_POST['prezimem'];
    $tel = $_POST['telefonm'];
    $email = $_POST['emailm'];
    $lozinka = $_POST['pswm'];
    $licnibr = $_POST['licnibrojm'];
    $brpac = $_POST['pacijentim'];
    $radi = $_POST['kovcentar'];
    $dod = $_POST['datumod'];
    $ddo = $_POST['datumdo'];
    $od = $_POST['radnovremeod'];
    $do = $_POST['radnovremedo'];
    $rv = $od . "-" . $do;
#kriptovanje lozinke
    $opcije = ['cost' => 10];
    $sifrovanaLozinka = password_hash($lozinka, PASSWORD_DEFAULT, $opcije);
    $sql = "UPDATE medicinari SET Ime='$ime',Prezime='$prezime', LicniBroj='$licnibr', Telefon='$tel', Email='$email', Sifra='$sifrovanaLozinka', BrojPacijenata='$brpac', RadnoVremeOd='$od', RadnoVremeDo='$do', DatumOd='$dod', DatumDo='$ddo', KovidCentar='$radi' WHERE IDMedicinara=$id;";
    $conn->query($sql);
    $id = $conn->insert_id;

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
    
            
            $sql2= $conn->query("INSERT INTO kalendar (IDMedicinara, Dan, Datum, RadnoVreme, PrePosle) VALUES('$id','$diw','$dan','$rvm','$kad')");
            if ($sql2 === TRUE) {
                echo "uspjeh";
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
  




$conn->close();



?>