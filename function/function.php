<?php 

function fetchDataFromApis($api_url) {
    // Configuration des options pour la requête HTTP
    $options = [
        "http" => [
            "header" => "Accept: application/json\r\n",
            "method" => "GET"
        ]
    ];

    // Création du contexte de la requête
    $context = stream_context_create($options);

    // Tentative de récupération des données depuis l'API
    $data = file_get_contents($api_url, false, $context);

    // Vérification si la récupération des données a échoué
    if ($data === FALSE) {
        return 'Erreur lors de la récupération des données depuis l\'API.';
    }

    // Décodage des données JSON
    $result = json_decode($data, true);

    return $result; 
} 

function fetchDataFromApi($api_url) {
    // Vérification de la validité de l'URL
    if (!filter_var($api_url, FILTER_VALIDATE_URL)) {
        return 'URL invalide.';
    }

    // Configuration des options pour la requête HTTP
    $options = [
        "http" => [
            "header" => "Accept: application/json\r\n",
            "method" => "GET"
        ]
    ];

    // Création du contexte de la requête
    $context = stream_context_create($options);

    // Tentative de récupération des données depuis l'API
    $data = @file_get_contents($api_url, false, $context);

    // Vérification si la récupération des données a échoué
    if ($data === FALSE) {
        return 'Erreur lors de la récupération des données depuis l\'API.';
    }
 
    // Décodage des données JSON
    $result = json_decode($data, true);

    // Vérification si le décodage JSON a échoué
    if (json_last_error() !== JSON_ERROR_NONE) {
        return 'Erreur lors du décodage des données JSON.';
    }

    return $result;
}


// $api_url_slider = $apiurl . 'Realisation/';
// $result_slider = fetchDataFromApis($api_url_slider);

function month($mois) {
    $moisEnChiffres = [
        'January' => 1,
        'February' => 2,
        'March' => 3,
        'April' => 4,
        'May' => 5,
        'June' => 6,
        'July' => 7,
        'August' => 8,
        'September' => 9,
        'October' => 10,
        'November' => 11,
        'December' => 12
    ];

    return isset($moisEnChiffres[$mois]) ? $moisEnChiffres[$mois] : "Invalid month";
}

function monthInFR($moisAnglais) {
    $moisTraduction = [
        'January' => 'Janvier',
        'February' => 'Février',
        'March' => 'Mars',
        'April' => 'Avril',
        'May' => 'Mai',
        'June' => 'Juin',
        'July' => 'Juillet',
        'August' => 'Août',
        'September' => 'Septembre',
        'October' => 'Octobre',
        'November' => 'Novembre',
        'December' => 'Décembre'
    ];

    return isset($moisTraduction[$moisAnglais]) ? $moisTraduction[$moisAnglais] : "Mois invalide";
}
