<?php

declare(strict_types=1);

namespace Alucas\td3;

class Scrapper
{

    // Fonction pour envoyer une requête HTTP GET
    function getWebPage($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}


?>