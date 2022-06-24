<?php

/*
 * directus.client.php
 * 
 * @author Mattéo Warmée
 * Creation 03/2022
 * Derniere MAJ 06/04/2022
 */

function getClientByLogin($login) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_PORT => "8055",
        CURLOPT_URL => "http://172.24.2.189:8055/items/Client?%5Bfilter%5D%5Bpseudo%5D%5B_eq%5D=$login",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer ViveLesDragons"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return (isset(json_decode($response)->data[0]))?json_decode($response)->data[0]:null;
    }
}
