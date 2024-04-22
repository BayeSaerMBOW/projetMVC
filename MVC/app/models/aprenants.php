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
            "genre"=> $ligne[5],
            "telephone"=> $ligne[6],
            "action"=> $ligne[7],
            "id"=>$ligne[8]
        );
    }
    //var_dump($tab_csv);
    fclose($csv);
    return $tabap_csv;
}
function filtrePlusRef($array, $refes){
    $arrayFiltre = [];
   
foreach($array as $arr){
    foreach($refes as $test){
        $refe = str_replace("_", " ", $test);
        $refand=recupnom($arr['referentiel']);
        if(strtolower($refand) == strtolower($refe)){
            $arrayFiltre[] = $arr;
        }
    }
    // if(in_array($arr['referentiel'], $refes)){
    //     $arrayFiltre[] = $arr;
    // }
}
return $arrayFiltre;
}

function recupnom($id){
    $referentiel= readrefcsv();
    foreach($referentiel as $ref){
        if($id==$ref["id"]){
            return $ref["nom"];
        }
        

    }
    return null ;
    
}
 
$students = readapcsv();



    ?>