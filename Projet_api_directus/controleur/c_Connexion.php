<?php

/*
 * Description de c_connexion.php
 * gere la connexion du conseiller
 * @author Mattéo Warmée
 * Creation 01/2021
 * Derniere MAJ 11/04/2022
 */
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/authentification.inc.php";

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["pseudo"]) && isset($_POST["mdpC"])) {
    $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
    $mdpC = filter_input(INPUT_POST, "mdpC", FILTER_SANITIZE_STRING);
} else {
    $pseudo = "";
    $mdpC = "";
}

if ($pseudo !== "" || $mdpC !== "") {
    login($pseudo, $mdpC);
}

if (isset($_GET["action"])) {
    if ($_GET["action"] === "deconnexion") {
        session_unset();
    }
}

if (isLoggedOn()) { // si l'utilisateur est connecté on redirige vers le controleur c_profil
    include_once "$racine/controleur/c_Affichage.php";
} else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
// appel du script de vue 
    $titre = "Authentification";
    include_once "$racine/vue/v_Connexion.php";
}