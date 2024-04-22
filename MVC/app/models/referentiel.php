<?php

$referentiels = [
    [
        'id' => '1',
        "nom" => "Dev Web/Mobile",
        "etat" => "Active",
    ],
    [
        'id' => '2',
        "nom" => "Referent Digital",
        "etat" => "Active",
    ],
    [
        'id' => '2',
        "nom" => "AWS",
        "etat" => "Active",
    ],
    [
        'id' => '3',
        "nom" => "Hackeuse",
        "etat" => "Active",
    ],
    [
        'id' => '4',
        "nom" => "Develeppement Data",
        "etat" => "Active",
    ]
];


//search est le name de l'input sur la page principale 
function filtrerReferentiels($referentiels) {
    return $referentiels['nom'] == $_POST["search"] || empty($_POST["search"]);
}


function readrefcsv(){
    $chemin='../data/list_referentiel.csv';
    $csv = fopen($chemin, 'r');
    
    while (($ligne=fgetcsv($csv)) !==false) {
        $tabref_csv[]=array(
            "id"=> $ligne[0],
            "nom"=> $ligne[1],
            "etat"=> $ligne[2],
        );
    }
     //var_dump($tab_csv);
    fclose($csv);
    return $tabref_csv;
}
$ref=readrefcsv();

if(isset($_POST["search"])){
    $referentielsFiltres = array_filter($ref, 'filtrerReferentiels');
}
else
{
    $referentielsFiltres = $ref;
}
$tabfiltref=array();
foreach($referentielsFiltres as $referentiels)
{

    if ($_SESSION["id_promo"]==$referentiels["id"]) {
    $tabfiltref[]=$referentiels;
    }
}
session_start();
$_SESSION["tabfiltref"]=$tabfiltref;