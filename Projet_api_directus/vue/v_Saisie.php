
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Réservation</title>
        <link rel="stylesheet" href="./css/style_saisie.css"/>    

    </head>
    <body>

        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        
        <form id="retour" action="./?action=affichage" method="post">
            <button type="submit">Retour </button>
        </form>
        
        <div classe="zone saisie">
            
            <form id="formSaisie" action="./?action=saisie" method="post">
                <h3>Réservation</h3>
                <label for="username">Téléphone</label>
                <input type="text" placeholder="Téléphone" id="tel" name="tel"><br>

                <label for="username">Mail</label>
                <input type="text" placeholder="Mail" id="Mail" name="mail"> <br>

                <label for="username">Date Debut</label>
                <input type="date" name="dateD"><br>

                <label for="username">Durée sejour</label>
                <input type="text" placeholder="Durée sejour" id="dure" name="dureSej"><br><br>

                <button id="buttonZS" type="submit">Saisir </button>

            </form>

        </div>
    </<body>
</html>

