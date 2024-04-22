<?php
    function readcsv(){
        $chemin='../data/list_presence.csv';
        $csv = fopen($chemin, 'r');
        
        while (($ligne=fgetcsv($csv)) !==false) {
            
            $tab_csv[]=array(
                "id" => $ligne[0],
                "matricule"=> $ligne[1],
                "nom"=> $ligne[2],
                "prenom"=> $ligne[3],
                "telephone"=> $ligne[4],
                "referentiel"=> $ligne[5],
                "heure_arrive"=> $ligne[6],
                "status"=> $ligne[7]
            );
        }
        fclose($csv);
        return $tab_csv;
    }
    
    $student=readcsv();
    
