<?php
/*
 * c_Affichage.php
 * 
 * @author Maxime Veschembes
 * Creation 03/2022
 * Derniere MAJ 06/04/2022
 */
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Affichage</title>
        <link rel="stylesheet" href="./css/style_affichage.css"/>    
        <script>
            var nbAppartements = <?= $nbAppartements; ?>
        </script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="./js/script.js"></script>

    </head>

    <body>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form id="deconnexion" action="./?action=deconnexion" method="post">
            <button type="submit">Déconnexion</button>
        </form>
        
        <div class="parent">
            <div class="div1">
                <img src="http://172.24.2.189:8055/assets/<?= $appartement->photo; ?>?width=600&height=300" id="slide">
            </div>
            <div class="div2">
                <button id="precedent" onclick="setDetailAppartementParIndex(-1)"><</button>
            </div>
            <div class="div3">
                <button id="suivant" onclick="setDetailAppartementParIndex(1)">></button>
            </div>
        </div>
        <div class="parent2">
            <div class="div4">
                <span id='prix'>
                    <?= $appartement->idtype->tariflocbase; ?>€ / mois<br/>
                </span>
                <span id='details'>
                    Type : <?= $appartement->idtype->libtype; ?><br/>
                    Numéro et Étage : <?= $appartement->numero . ' | ' . $appartement->etage; ?><br/>
                    Adresse : <?= $appartement->idimm->adimm . ' ' . $appartement->idimm->ville; ?><br/>
                    <?= ($appartement->idimm->ascenseur) ? "L'immeuble a un ascenseur" : "L'immeuble n'a pas d'ascenseur"; ?><br/>
                    Propriétaire : <?= $appartement->idprop->prenomprop . ' ' . $appartement->idprop->nomprop; ?><br/>
                    Description : <?= $appartement->descriptif; ?><br/>
                </span>
                <form action="./?action=saisie" method="POST">
                    <button id="button" name="button" value="<?= $appartement->id; ?>" type="submit">Saisir</button>
                </form>
            </div>
        </div>
        <div>
            
        </div>
    </body>

</html>