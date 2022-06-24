<?php

/*
 * directus.appartement.php
 * 
 * @author Maxime Veschembes
 * Creation 03/2022
 * Derniere MAJ 06/04/2022
 */

function getPremierAppartement() {

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_PORT => "8055",
        CURLOPT_URL => "http://172.24.2.189:8055/items/appartement?fields=id%2Cetage%2Cnumero%2Cidimm.adimm%2Cidimm.ascenseur%2Cidimm.ville%2Cidprop.nomprop%2Cidprop.prenomprop%2Cdescriptif%2Cidtype.libtype%2Cidtype.tariflocbase%2Cphoto&%5Bfilter%5D%5Bphoto%5D%5B_neq%5D=sansPhoto&limit=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer JetonDeSecurite"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err)
        echo "cURL Error #: $err";

    return json_decode($response)->data[0];
}

function getCountAllAppartements() {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_PORT => "8055",
        CURLOPT_URL => "http://172.24.2.189:8055/items/appartement?meta=filter_count&fields=0&%5Bfilter%5D%5Bphoto%5D%5B_neq%5D=sansPhoto",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
            "Access-Control-Allow-Origin: 172.24.2.189:8055",
            "Authorization: Bearer JetonDeSecurite",
            "CORS_ALLOWED_HEADERS: Authorization, Content-Type, Access-Control-Allow-Origin",
            "CORS_CREDENTIALS: true",
            "CORS_ENABLED: true",
            "CORS_METHODS: GET,POST,PUT,PATCH,DELETE",
            "CORS_ORIGIN: true"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err)
        echo "cURL Error #: $err";
    
    return json_decode($response)->meta->filter_count;
}
