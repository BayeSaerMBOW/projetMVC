<?php
/* $students = [

    [
        "image" => 'img1.png',
        "nom" => 'seydina',
        "prenom" => 'mhpppppd',
        "email" => 'moupppssa',
        "genre" => 'M',
        "telephone" => '777777777',
        "action" => "absent"

    ],
    [
        "image" => 'img1.png',
        "nom" => 'paeeethe',
        "prenom" => 'peeeathe',
        "email" => 'pathe',
        "genre" => 'M',
        "telephone" => '777777777',
        "action" => "absent"

    ],
    [
        "image" => 'img1.png',
        "nom" => 'seydina',
        "prenom" => 'meehd',
        "email" => 'moussa',
        "genre" => 'M',
        "telephone" => '777777777',
        "action" => "present"

    ],
    [
        "image" => 'img1.png',
        "nom" => 'pathe',
        "prenom" => 'pathe',
        "email" => 'pathe',
        "genre" => 'M',
        "telephone" => '777777777',
        "action" => "absent"

    ]
    
];
 */


function readapcsv(){
    $chemin='../data/list_aprenant.csv';
    $csv = fopen($chemin, 'r');
    
    while (($ligne=fgetcsv($csv)) !==false) {
        $tabap_csv[]=array(
            "image"=> $ligne[0],
            "nom"=> $ligne[1],
            "prenom"=> $ligne[2],
            "email"=> $ligne[3],
            "genre"=> $ligne[4],
            "telephone"=> $ligne[5],
            "action"=> $ligne[6],
            "id"=>$ligne[7]
        );
    }
    //var_dump($tab_csv);
    fclose($csv);
    return $tabap_csv;
}
$students = readapcsv();
    ?>