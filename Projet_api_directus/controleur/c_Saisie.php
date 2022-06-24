<?php

/*
 * Description de c_Principal.php
 * 
 * @author Mattéo Warmée
 * Creation 02/05/2022
 * Derniere MAJ 02/05/2022
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/directus.saisieInformations.php";

if (isLoggedOn()) {
    if (isset($_POST["button"])) {
        $_SESSION["idAppart"] = filter_input(INPUT_POST, "button", FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["mail"]) && isset($_POST["tel"]) && isset($_POST["dateD"]) && isset($_POST["dureSej"])) {
        $mel = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_EMAIL);
        $tel = filter_input(INPUT_POST, "tel", FILTER_SANITIZE_STRING);
        $dateD = filter_input(INPUT_POST, "dateD", FILTER_SANITIZE_STRING);
        $dureSej = (int) filter_input(INPUT_POST, "dateD", FILTER_SANITIZE_NUMBER_INT);

        InsertInfoSaisie($tel, $mel, $_SESSION["idAppart"], $_SESSION["id"], $dateD, $dureSej);
    } else {
        echo 'patate';
    }


    include_once "$racine/vue/v_Saisie.php";
} else {
    $titre = "authentification";
    include_once "$racine/vue/v_Connexion.php";
}


