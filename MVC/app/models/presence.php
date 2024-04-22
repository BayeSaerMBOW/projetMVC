<?php
$student =
    [

        [
            "matricule" => 'P6_DEVDAT_2024_119',
            "nom" => 'seydina',
            "prenom" => 'mhd',
            "telephone" => '7999999999',
            "referentiel" => 'DEV WEB',
            "heure_arrive" => '777777777',
            "status" => 'present'

        ],
        [
            "matricule" => 'P6_DEVDAT_2024_119',
            "nom" => 'seydina',
            "prenom" => 'mhd',
            "telephone" => '7777777777',
            "referentiel" => 'DEV DATA',
            "heure_arrive" => '8h:00',
            "status" => 'absent'

        ],
        [
            "matricule" => 'P6_DEVDAT_2024_119',
            "nom" => 'breukh',
            "prenom" => 'mhd',
            "telephone" => '7777777777',
            "referentiel" => 'DEV DATA',
            "heure_arrive" => '8h:00',
            "status" => 'absent'

        ],
        [
            "matricule" => 'P6_DEVDAT_2024_119',
            "nom" => 'mreukh',
            "prenom" => 'mhd',
            "telephone" => '7777777777',
            "referentiel" => 'DEV DATA',
            "heure_arrive" => '8h:00',
            "status" => 'absent'

        ],
        [
            "matricule" => 'P6_DEVDAT_2024_119',
            "nom" => 'mrepppukh',
            "prenom" => 'mhsssd',
            "telephone" => '7777777777',
            "referentiel" => 'DEV DATA',
            "heure_arrive" => '8h:00',
            "status" => 'absent'

        ],
        [
            "matricule" => 'P6_DEVDAT_2024_119',
            "nom" => 'mreukh',
            "prenom" => 'mhsssd',
            "telephone" => '7777777777',
            "referentiel" => 'DEV DATA',
            "heure_arrive" => '8h:00',
            "status" => 'present'

        ]
        ,
        [
            "matricule" => 'P6_DEVDAT_2024_119',
            "nom" => 'mrepppukh',
            "prenom" => 'mhsssd',
            "telephone" => '7777777777',
            "referentiel" => 'DEV DATA',
            "heure_arrive" => '8h:00',
            "status" => 'absent'

        ],
        [
            "matricule" => 'P6_DEVDAT_2024_119',
            "nom" => 'mreukh',
            "prenom" => 'mhsssd',
            "telephone" => '7777777777',
            "referentiel" => 'DEV DATA',
            "heure_arrive" => '8h:00',
            "status" => 'absent'

        ]
        
    ];
    // function filtrerReferentiels($referentiel) {
    //     return $referentiel['nom'] == $_POST["search"] || empty($_POST["search"]);
    // }
    
    // $referentielsFiltres = array_filter($referentiels, 'filtrerReferentiels');


    if (isset($_POST["status"])) {
        $filtrer_status = $_POST['status'];
    
        $etudiants_filter = array_filter($students, function ($student) use ($filtrer_status) {
            return $student['status'] == $filtrer_status;
        });
        foreach ($etudiants_filtres as $etudiant) {
            echo "<div>Nom de l'apprenant filtré : " . $etudiant['nom'] . "</div>";
            echo "<div>Statut de l'apprenant filtré : " . $etudiant['statut'] . "</div>";
        }
    }
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
    function presence_filter(){
        
    }
