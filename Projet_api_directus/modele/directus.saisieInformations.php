<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function InsertInfoSaisie(string $tel, string $mel, int $idappart, string $idclient, string $dateD, int $dureSej) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_PORT => "8055",
        CURLOPT_URL => "http://172.24.2.189:8055/items/SaisieInformations",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n\t\t\"telephone\": \"$tel\",\n\t\t\"mel\": \"$mel\",\n\t\t\"idappart\": $idappart,\n\t\t\"idclient\": \"$idclient\",\n\t\t\"datedebut\": \"$dateD\",\n\t\t\"duree\": $dureSej \n\t}",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer JetonDeSecurite",
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}
