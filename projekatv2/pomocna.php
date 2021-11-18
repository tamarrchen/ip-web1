<?php 

                    include("config.php");

                    if(isset($_POST['prikazi'])){
                    $dan=$_POST['dan'];
                    $od=$_POST['vreme1'];
                    $do=$_POST['vreme2'];

                    $sql=$conn->query("SELECT * FROM zakazi");


                    while($niz[]=$sql->fetch_object());
                        array_pop($niz);
                        foreach($niz as $option) {
                            //echo $option->DatumZakazivanja;
                            $idmed=$option->IDMedicinara;
                            $idpac=$option->IDPacijenta;

                            $med=$conn->query("SELECT Ime,Prezime FROM medicinari WHERE IDMedicinara='$idmed';");
                            while($niz1[]=$med->fetch_object());
                                array_pop($niz1);
                                foreach($niz1 as $option1) {
                                    $mime=$option1->Ime;
                                    $mprezime=$option1->Prezime;
                                    $m= $mime . " " . $mprezime;
                                }




                            $pac=$conn->query("SELECT Ime,Prezime FROM pacijenti WHERE IDPacijenta='$idpac';");
                            while($niz2[]=$pac->fetch_object());
                                array_pop($niz2);
                                foreach($niz2 as $option2) {
                                    $pime=$option2->Ime;
                                    $pprezime=$option2->Prezime;
                                    $p= $pime . " " . $pprezime;
                                }




                            $raz= preg_split("/ /", $option->DatumZakazivanja);
                            $raz_vreme=$raz[1];
                            //echo $raz_vreme;
                            $raz1=preg_split("/-/",$raz_vreme);
                            $raz_poc_vr=strtotime($raz1[0]);
                            $raz_kraj_vr=strtotime($raz1[1]);
                           // echo "  SVI TERMINI  " . $dan . "   datum   " . $raz[0] . " pocetak " . $raz1[0]. "  kraj " . $raz1[1] . " \n " ;
                            if($dan==$raz[0]) {
                                if($raz1[0]>=$od && $raz1[0]<=$do)
                                //echo " termin upada u opseg " . $m. "      "  . $p . "   datum   " . $raz[0] . " pocetak " . $raz1[0]. "  kraj " . $raz1[1] . PHP_EOL . " ";
                            ?>