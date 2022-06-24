<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once "directus.client.php";

function login(string $pseudo, string $mdpC) {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    //recupère les infos du conseiller via la BDD
    $client = getClientByLogin($pseudo);
    //var_dump ($conseil);
    if (isset($client->mdp)){
        $mdpBD = $client->mdp;
        if (password_verify($mdpC,$mdpBD)){
            $_SESSION["pseudo"] = $pseudo;
            $_SESSION["id"]= $client->id;
            $_SESSION["mdpC"] = $mdpBD;
        }
    }
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    $ret = false;

    if (isset($_SESSION["pseudo"])) {
        $conseil = getClientByLogin($_SESSION["pseudo"]);
        if ($conseil->pseudo === $_SESSION["pseudo"] && $conseil->mdp === $_SESSION["mdpC"]) {
            $ret = true;
        }
    }
    return $ret;
}