<?php

/*
 * Description de c_Principal.php
 * 
 * @author Mattéo Warmée
 * Creation 30/03/2022
 * Derniere MAJ 06/04/2022
 */

function controleurPrincipal(string $action) {
    $lesActions = array();
    $lesActions["connexion"] = "c_Connexion";
    $lesActions["affichage"] = "c_Affichage";
    $lesActions["saisie"] = "c_Saisie";
    $lesActions["deconnexion"] = "c_Connexion";
    
    return (array_key_exists($action, $lesActions)) ? $lesActions[$action] : $lesActions["connexion"];
}
