
<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Identification</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style_connexion.css"/>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="./?action=connexion" method="POST">
        <h3>S'identifier</h3>

        <label for="username">Pseudo</label>
        <input type="text" placeholder="Pseudo" id="username" name="pseudo">

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Mot de passe" id="password" name="mdpC">

        <button id="button" type="submit">Connexion </button>
    </form>
</body>
</html>
