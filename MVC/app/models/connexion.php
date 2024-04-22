<?php
    function readcsvAdmin(){
        $chemin='../data/list_admin.csv';
        $csv = fopen($chemin, 'r');
        /* var_dump($csv);
        die(); */
        while (($ligne=fgetcsv($csv)) !==false) {

            $tab_csv[]=array(
                "id" => $ligne[0],
        
                "nom"=> $ligne[1],
                "prenom"=> $ligne[2],
                "email"=> $ligne[3],
                "password"=> $ligne[4],
            );
        }
        fclose($csv);
        return $tab_csv;
    }
    function readcsvApprenants(){
        $chemin='../data/list_aprenant.csv';
        $csv = fopen($chemin, 'r');
        
        while (($ligne=fgetcsv($csv)) !==false) {
            
            $tab_csv[]=array(
                "id" => $ligne[0],
                "nom"=> $ligne[1],
                "prenom"=> $ligne[2],
                "email"=> $ligne[3],
                "password"=> $ligne[4]
            );
        }
        fclose($csv);
        return $tab_csv;
    }
    
    $admins=readcsvAdmin();
    $apprenants=readcsvApprenants();
    
