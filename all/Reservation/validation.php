<!DOCTYPE html>
<html>

    
    <!-- Affichage Dans l'onglet et choix des caractères-->
    <head>
        <title> Théâtres de Bourbon : Validation de la commande</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="../Style/style.css">
        <link rel="stylesheet" href="../Style/style2.css">
    </head>
      
    





    
     <!-- Corps de la page-->
    <body>
          

    
        <div class="bandeau">
                                             
                                            <h1>Théâtres de Bourbon : Validation de la commande</h1>
        </div><!--bandeau-->



        <main>
            <div class='decalage'>
                <?php

                    if($_POST['valid'] == 1){
                        $CHOIX = [];
                        $ligne = 0;
                        if (($handle = fopen("../CSV/ResultatsFestival.csv", "r")) !== FALSE) {
                            $head = fgetcsv($handle, 1000, ",");
                            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                $CHOIX[$ligne] = $data;
                                $ligne++;
                            }
                        fclose($handle);
                        }
                        $place = json_decode($_POST['place']);
                        for ($i=1; $i < count($place); $i++) { 
                              $CHOIX[$place[$i][0]][6] = $CHOIX[$place[$i][0]][6]*1 + $place[$i][1]*1;
                              $CHOIX[$place[$i][0]][7] = $CHOIX[$place[$i][0]][7]*1 + $place[$i][2]*1;
                              $CHOIX[$place[$i][0]][11] = $CHOIX[$place[$i][0]][11]*1 + $place[$i][3]*1;                              
                        }

                        $fp = fopen("../CSV/ResultatsFestival.csv", "w");
                        fputcsv($fp, $head);
                        foreach ($CHOIX as $line) {
                            fputcsv($fp, $line);
                        }
                        fclose($fp);

                        echo "<div class='bloc_bleu'>\n<h2>Votre commande a été enregistrée avec succès !</h2>\n";
                        echo "<form action='../index.php'>\n<input type='submit' value='Retourner vers le site'>\n</form></div>";


                    }else{
                        
                        echo "<div class='bloc_bleu'>";  
    
                        $p = json_decode($_POST['place'])[0];
                        echo "<table id='val_but'><td><h2> Détails des places : ";
                        echo "<ul><li>".$p[1]." place(s) Plein Tarif </li>";
                        echo "<li>".$p[2]." place(s) Tarif Réduit </li>";
                        echo "<li>".$p[3]." place(s) Gratuit enfant </li></ul>";
                        echo "<br>Montant à régler : ".$_POST['prix']."€";
                    
                        echo "</h2></td><td>";

                        echo "<form action='validation.php' method='post'>";
                        echo "<input type='hidden' name='prix' value=".$_POST['prix'].">\n";
                        echo "<input type='hidden' name='place' value='".$_POST['place']."'>\n";
                        echo "<input type='hidden' name='valid' value=1>\n";
                        echo "<input type='submit' value='Valider mon choix'>\n";
                    }
                ?>
                </form>
                </td></table>
                </div> 
            </div>
        </main>

        <footer>
        Festival Théâtres de Bourbon  <address>Page conçue par Kevin HUART et Mathilde VERRIEZ CHASTANG</address> 
        </footer>


    </body>

</html>