<?php
session_start();
if(isset($_REQUEST['page']) && $_REQUEST['page'] == 'logout'){
    session_destroy();
    header("Location:index.php");
}
//ini_set('display_errors', 'On');
$Pages = array(
    "app" => "aprenants",
    "dash" => "dashboard",
    "even" => "evenements",
    "pre" => "presence",
    "ref" => "referentiel",
    "vis" => "visiteurs",
    "pro" => "promotion",
    "pro1" => "promotion1",
    "pro2" => "promotion2",
);


$role = "";
if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
}


include_once ("../config/config.php");

if (isset($_REQUEST['page']) && !empty($role)) {
    $uri = $_REQUEST['page'];
    if (array_key_exists($uri, $Pages)) {
        $page = $Pages[$uri];
        if ($uri == "app") {
            $eleByPage = 3;
            $pageEtu = isset($_GET['pageAff']) ? $_GET['pageAff'] : 1;
            $totalPage = ceil(count($students) / $eleByPage);
            if ($pageEtu < 1 || $pageEtu > $totalPage)
                header("Location:?page=$uri&pageAff=1");
            $eleDeb = ($pageEtu - 1) * $eleByPage;
            $etudiantsPage = array_slice($students, $eleDeb, $eleByPage);
        } elseif ($uri == "pre") {
            $eleByPage = 6;
            $pageEtu = isset($_GET['pageAff']) ? $_GET['pageAff'] : 1;
            $totalPage = ceil(count($student) / $eleByPage);

            if ($pageEtu < 1 || $pageEtu > $totalPage) {
                header("Location:?page=$uri&pageAff=1");
            }

            $eleDeb = ($pageEtu - 1) * $eleByPage;
            $etudiantsPage = array_slice($student, $eleDeb, $eleByPage);

        }
         

        if (isset($_POST['changeId'])) {
            $id = $_POST['changeId'];
            $_SESSION["id_promo"] = $id;

            include_once("/var/www/html/Project/app/models/promos.php");
            $promos=readpocsv();
           foreach ($promos as &$promo) {
            if ($promo['id'] == $id) {

               $promo['etat']='activer';

            }
            else{
                $promo['etat']='desactiver';
            }
           }
           $chemin='../data/list_promos.csv';
           writecsv($promos,$chemin);


        }
        
        include (YOON . "/app/templates/partiel/layout.html.php");
    } else {
        include_once (YOON . "/app/templates/error.html.php");
    }
} else {
    include_once (YOON . "/app/templates/connexion.html.php");
    
}
?>