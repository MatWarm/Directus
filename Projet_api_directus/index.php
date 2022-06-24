<?php

/*
 * Index.php
 * 
 * @author Maxime Veschembes
 * Creation 03/2022
 * Derniere MAJ 04/04/2022
 */

// Définition de $racine
$racine = dirname(__FILE__);

if (!isset($_SESSION)) {
        session_start();
}

// Appel du contrêleur principal
include_once "$racine/controleur/c_Principal.php";

// Récupération du contrôleur en fonction de
$fichier = controleurPrincipal((isset($_GET['action'])) ? $_GET['action'] :'');

// Appel du controleur
include_once "$racine/controleur/$fichier.php";

