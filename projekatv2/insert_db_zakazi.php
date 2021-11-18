<?php 
session_start();
include("config.php");
    

    if(isset($lekar))  $lekar = $_POST['lekar'];
    $simptomi = $_POST['simptomi'];
    $temp = $_POST['temp'];
    $brdana = $_POST['brdana'];
    $korona = $_POST['korona'];
    $id = $_SESSION['idosobe'];
   
    


    #pauza u prvoj smeni od 10 do pola 11 a u drugoj smeni od 7 do pola 8
    if($korona=='da'){
      #bilo koji prvi slobodan lekar
      echo "DAAAA";
      #iz tabele kalendar se uzima prvi datum gde je moguce rezervisati termin
      $sql1=$conn->query("SELECT* FROM kalendar WHERE IDMedicinara!=0 AND Datum> now() AND RasporedpoTerminima IS NULL  ORDER BY 'Datum' ASC LIMIT 1");
      while($niz[]=$sql1->fetch_object());
      array_pop($niz);
      foreach($niz as $option) 
      {
        $dat=$option->Datum;
        echo " ispis prvog slobodnog  id datuma , id medicinara koji radi za taj datum, radnog vremena i datuma " .$option->IDDatum . " " . $option->IDMedicinara . " " . $option->RadnoVreme . " " . $option->Datum;
        $lekar=$option->IDMedicinara;
        $razdvoji=preg_split("/-/",$option->RadnoVreme); #radno vreme oblika hh:mm-hh:mm
        $pocetak=$razdvoji[0]; #pocetak radnog vremena
        $p=strtotime($pocetak); #u sekundama
        #echo $pocetak . $p;
        $kraj=$razdvoji[1]; #kraj radnog vremena
        $k=strtotime($kraj); #u sekundama
        $delta= $k - $p - 1800; #trajanje radnog vremena u sekundama bez pauze od pola sata
        $dd=$delta/3600; #trajanje radnog vremena u satima
        echo "  Trajanje radnog vremena " . $dd . "sati      ";
        #broj pacijenata na sat za medicinara
        $sql2=$conn->query("SELECT BrojPacijenata FROM medicinari WHERE medicinari.IDMedicinara='$option->IDMedicinara' ");
        while($niz1[]=$sql2->fetch_object());
        array_pop($niz1);
        foreach($niz1 as $option) 
        { 
          $brr= (int)($option->BrojPacijenata);
          echo "  Broj pacijenata na sat za izabranog medicinskog radnika  " . $brr;
        }
      
      $brt=$dd * $brr;
      echo "  Broj termina za datum " . $brt;
      }
      $sql3=$conn->query("SELECT MAX(DatumZakazivanja) AS sd FROM zakazi WHERE DatumZakazivanja LIKE '$dat%' "); #poslednji zakazani termin za prvi slobodan dan
      while($niz2[]=$sql3->fetch_object());
      array_pop($niz2);
      foreach($niz2 as $option) 
      {
        if($option->sd)
        {
           $max_termin=$option->sd;  #max termin je poslednji zakazani termin za izabrani datum dat
          #echo "max datum" . $max_termin; 
          $raz= preg_split("/ /", $max_termin); #razdvajanje na datum i vreme
          $raz_vreme=$raz[1]; #radno vreme oblika hh:mm-hh:mm
          #echo $raz_vreme;
          $raz1=preg_split("/-/",$raz_vreme); #razdvajanje vremena pocetka i kraja
          $raz_poc_vr=strtotime($raz1[0]); #pocetak poslednjeg zakazanog termina u sekundama
          $raz_kraj_vr=strtotime($raz1[1]); #kraj poslednjeg zakazanog termina u sekundama
          #echo " kraj " . $raz1[1]. "  dd " . $raz_kraj_vr ;
        }
        else
        {
          $raz_kraj_vr=$p;
        }
   
        $p1poc=strtotime('10:00:00'); #prva pauza pocetak sekunde
        $pauza1poc=date("H:i",$p1poc); # sati
        $p1kraj=strtotime('10:30:00'); #prva pauza kraj sekunde
        $pauza1kraj=date("H:i",$p1kraj); #sati
        $p2poc=strtotime('19:00:00'); #druga pauza pocetak sekunde
        $pauza2poc=date("H:i",$p2poc); #sati
        $p2kraj=strtotime('19:30:00'); #druga pauza kraj sekunde
        $pauza2kraj=date("H:i",$p2kraj); #sati
  
        #echo "   PAUZE   " .  $p1poc . "  " . $pauza1poc . "        "; 
  
        #AKO JE POSLEDNJI TERMIN ULETI U PAUZU ILI SE POKLAPA SA POCETKOM PAUZE PRVI SLEDE'I TERMIN SE ZAKAZUJE NAKON KRAJA PAUZE
        #PRVA PAUZA
        if($raz_kraj_vr>$p1poc && ($raz_kraj_vr<$p1kraj || $raz_kraj_vr==$p1poc)) 
        { #ako je pocetak prve pauze pre kraja poslednjeg zakazanog termina i kraj prve pauze posle 
          $raz_kraj_vr=$p1kraj;                                                     #kraja poslednjeg zakazanog termina ili je kraj pauze kad i kraj zakazanog termina
          #kraj radnog vremena dobija vrednost kraja pauze
          #echo $raz_kraj_vr;                                            
        }
        #DRUGA PAUZA
        if(($raz_kraj_vr>$p2poc && $raz_kraj_vr<$p2kraj) || $raz_kraj_vr==$p2poc)
        {
          $raz_kraj_vr=$p2kraj;
          #echo $raz_kraj_vr;
        }
        $nov_termin =date("H:i", ($raz_kraj_vr + 3600/$brr));
        echo "nov termin je poslednji termin plus vreme potrebno lekaru za jednog pacijenta" . $nov_termin;
        $zakazani_termin=$dat. " ". date("H:i",$raz_kraj_vr) . "-" . $nov_termin;
        if($nov_termin >=$kraj)   #"KRAJ RADNOG VREMENA"; 
          {
            $sql4=$conn->query("UPDATE kalendar SET RasporedpoTerminima='1' WHERE Datum='$dat' AND IdMedicinara!='0';");
          }
      }
    }
    

    if($korona=='ne'){
      #njegov lekar
      echo "NEEEEEEEE";
      $sql1=$conn->query("SELECT* FROM kalendar WHERE IDMedicinara='$lekar' AND Datum> now() AND RasporedpoTerminima IS NULL  ORDER BY 'Datum' ASC LIMIT 1");
        while($niz[]=$sql1->fetch_object());
        array_pop($niz);
      foreach($niz as $option) 
      {
        $dat=$option->Datum;
        echo $option->IDDatum . " " . $option->IDMedicinara . " " . $option->RadnoVreme . " " . $option->Datum;
        $razdvoji=preg_split("/-/",$option->RadnoVreme);
        $pocetak=$razdvoji[0];
        $p=strtotime($pocetak);
        $kraj=$razdvoji[1];
        $k=strtotime($kraj);
        $delta= $k - $p - 1800;
        echo "delta". $delta;
        $dd=$delta/3600;
        #echo "  Trajanje radnog vremena " . $dd ;

        #broj pacijenata na sat za medicinara
        $sql2=$conn->query("SELECT BrojPacijenata FROM medicinari WHERE medicinari.IDMedicinara='$lekar' ");
        
        while($niz1[]=$sql2->fetch_object());
        array_pop($niz1);
        foreach($niz1 as $option) 
        { 
          $brr = (int)($option->BrojPacijenata);
          echo "  Broj pacijenata  " . $brr;
        }
      }
        $brt=$dd * $brr;
        echo "  Broj termina  " . $brt;
        $sql3=$conn->query("SELECT MAX(DatumZakazivanja) AS sd FROM zakazi WHERE DatumZakazivanja LIKE '$dat%' ");
        while($niz2[]=$sql3->fetch_object());
        array_pop($niz2);
      foreach($niz2 as $option) 
      {
          if($option->sd)
          {
            $max_termin=$option->sd;  #max termin je poslednji zakazani termin za izabrani datum dat
            #echo "max datum" . $max_termin; 
            $raz= preg_split("/ /", $max_termin); #razdvajanje na datum i vreme
            $raz_vreme=$raz[1]; #radno vreme oblika hh:mm-hh:mm
            #echo $raz_vreme;
            $raz1=preg_split("/-/",$raz_vreme); #razdvajanje vremena pocetka i kraja
            $raz_poc_vr=strtotime($raz1[0]); #pocetak poslednjeg zakazanog termina u sekundama
            $raz_kraj_vr=strtotime($raz1[1]); #kraj poslednjeg zakazanog termina u sekundama
            #echo " kraj " . $raz1[1]. "  dd " . $raz_kraj_vr ;
          }
          else
          {
            $raz_kraj_vr=$p;
          } 
          $p1poc=strtotime('10:00:00');
          $pauza1poc=date("H:i",$p1poc);
          $p1kraj=strtotime('10:30:00');
          $pauza1kraj=date("H:i",$p1kraj);
          $p2poc=strtotime('19:00:00');
          $pauza2poc=date("H:i",$p2poc);
          $p2kraj=strtotime('19:30:00');
          $pauza2kraj=date("H:i",$p2kraj);
          #echo "   PAUZE   " .  $p1poc . "  " . $raz_kraj_vr . "        "; 

        if($raz_kraj_vr>$p1poc && ($raz_kraj_vr<$p1kraj || $raz_kraj_vr==$p1poc))
          { 
            $raz_kraj_vr=$p1kraj;
            echo $raz_kraj_vr;
          }
        if($raz_kraj_vr>$p2poc && ($raz_kraj_vr<$p2kraj || $raz_kraj_vr==$p2poc)) 
          {
            $raz_kraj_vr=$p2kraj;
            echo $raz_kraj_vr;
          }
        $nov_termin = date("H:i", ($raz_kraj_vr + 3600/$brr));
        echo " novi termin " . $nov_termin;
        $zakazani_termin=$dat. " ". date("H:i",$raz_kraj_vr) . "-" . $nov_termin;
        echo $zakazani_termin;
        if($nov_termin >=$kraj)   #"KRAJ RADNOG VREMENA"; 
        {
          $sql4=$conn->query("UPDATE kalendar SET RasporedpoTerminima='1' WHERE Datum='$dat' AND IdMedicinara!='0';");
        }
      }
    }

    

    #U SLUCAJU DA JE NOVOZAKAZANI TERMIN HITNIJI OD NEKOG PRETHODNOG TJ AKO JE TEMP >4 DANA
if($zakazani_termin){


      $s = "DELETE FROM zakazi WHERE IDPacijenta=$id";
      $conn->query($s);
      $sql = "INSERT INTO zakazi (IDPacijenta, IDMedicinara, IdentifikatorKorone, Temperatura, BrojDanaTemp, Simptomi,DatumZakazivanja) VALUES ('$id','$lekar','$korona','$temp','$brdana','$simptomi','$zakazani_termin');";
      $conn->query($sql);



      if($temp>4){
        $upit=$conn->query("SELECT * FROM zakazi WHERE BrojDanaTemp<5");
        while($niz5[]=$upit->fetch_object());
        array_pop($niz5);
        foreach($niz5 as $option) { 
          $nije_hitno= $option->IDZakazivanja;
          $termin_nije_hitno= $option->DatumZakazivanja;
        
        $upit1=$conn->query("UPDATE zakazi SET DatumZakazivanja='$zakazani_termin' WHERE IDZakazivanja='$nije_hitno';");
        if ($upit1 === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $upit1 . "<br>" . $conn->error;
        }
        
        $upit2=$conn->query("UPDATE zakazi SET DatumZakazivanja='$termin_nije_hitno' WHERE IDPacijenta='$id';");
        if ($upit2 === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $upit2 . "<br>" . $conn->error;
        }
      }
      }
    }
      header("Location:prikazi_raspored_p.html");
  ?>