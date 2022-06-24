<?php

/*
 * c_Affichage.php
 * 
 * @author Maxime Veschembes
 * Creation 03/2022
 * Derniere MAJ 06/04/2022
 */

// Redéfinition de $racine si nécessaire
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__)
    $racine = "..";
include_once "$racine/modele/authentification.inc.php";
// Appel des fonctions
if (isLoggedOn()) {
    include_once "$racine/modele/directus.appartement.php";

// Appel de la fonction des images d'appartement
    $appartement = getPremierAppartement();

// Récupération du nombre d'appartement
    $nbAppartements = getCountAllAppartements();

// Appel de la vue

    include_once "$racine/vue/v_Affichage.php";
} else {
    $titre = "authentification";
    include_once "$racine/vue/v_Connexion.php";
}



