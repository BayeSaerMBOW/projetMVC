<?php
//  $promos = [
//     [
//         'id' => '6',
//         'libelle' => 'Promotion 6',
//         'date_debut' => '2024-03-01',
//         'date_fin' => '2024-03-31',
//         'etat' => 'desactiver',
//     ],
//     [
//         'id' => '5',
//         'libelle' => 'Promotion 5',
//         'date_debut' => '2024-04-01',
//         'date_fin' => '2024-04-30',
//         'etat' => 'activer',
//     ],
//     [
//         'id' => '4',
//         'libelle' => 'Promotion 4',
//         'date_debut' => '2024-03-01',
//         'date_fin' => '2024-03-31',
//         'etat' => 'desactiver',
//     ],
//     [
//         'id' => '3',
//         'libelle' => 'Promotion 3',
//         'date_debut' => '2024-04-01',
//         'date_fin' => '2024-04-30',
//         'etat' => 'desactiver',
//     ],
//     [
//         'id' => '2',
//         'libelle' => 'Promotion 2',
//         'date_debut' => '2024-03-01',
//         'date_fin' => '2024-03-31',
//         'etat' => 'desactiver',
//     ],
//     [
//         'id' => '1',
//         'libelle' => 'Promotion 1',
//         'date_debut' => '2024-03-01',
//         'date_fin' => '2024-03-31',
//         'etat' => 'desactiver',
//     ]
// ];

function readpocsv(){
    $chemin='../data/list_promos.csv';
    $csv = fopen($chemin, 'r');
    
    while (($ligne=fgetcsv($csv)) !==false) {
     
        $tabpo_csv[]=array(
            "libelle"=> $ligne[0],
            "date_debut"=> $ligne[1],
            "date_fin"=> $ligne[2],
            "etat"=> $ligne[3],
            "id"=> $ligne[4],
        );
    }
    fclose($csv);
    return $tabpo_csv;
}
/* $chemin='../data/list_promos.csv'; */
function writecsv($promotions, $fichier) {
    // Ouvre le fichier CSV en mode écriture
    $fp = fopen($fichier, 'w');
    
    // Parcourt chaque promotion dans le tableau
    foreach ($promotions as $promotion) {
        // Écrit une ligne dans le fichier CSV avec les données de la promotion
        fputcsv($fp, [
            $promotion['libelle'],
            $promotion['date_debut'],
            $promotion['date_fin'],
            $promotion['etat'],
            $promotion['id']
        ]);
    }
    
    // Ferme le fichier après avoir écrit toutes les promotions
    fclose($fp);
}

// function activerpromo($id,$csv) {
//     $promos = array_map('str_getcsv', file($csv));

//     foreach($promos as $key => $promo){
//             if($promo[4] == $id){
//                 $promos[$key][3] = '1';
//             }
//             else if($promo[3] != 'statut'){
//                 $promos[$key][3] = '0';
//             }
//         }
//     $data = $promos;
//     $fp = fopen($csv, 'w');
//     foreach ($promos as $promo) {
//         fputcsv($fp, $promo);
//     }
//     fclose($fp);
// }