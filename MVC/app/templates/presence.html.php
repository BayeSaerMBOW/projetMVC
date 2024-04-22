<div class="milieu-pre">
    <div class="entete-pre">
        <div class="">Présence</div>
        <div class="entete2" style="font-size: .8rem;">Présence*liste</div>
    </div>
    
    <form action="index.php?page=pre" class="from-pre" method="POST">
        <input type="hidden" name="page" value="pre">
        <div class="aligner_button">
            <div style="border: 1px solid #ccc;padding: 1%;margin-right: 2%;border-radius: 10px;">
                <select name="status" id="">
                <option value="">Status</option>
                    <option value="present">present</option>
                    <option value="absent">absent</option>
                </select>

            </div>
            <div style="border: 1px solid #ccc;padding: 1%;margin-right: 2%;border-radius: 10px;">

                <select name="referentiel" id="">
                <option value="">referentiel</option>
                    <?php foreach($_SESSION["tabfiltref"] as $tabfiltref):?>
                    <option value="<?php echo $tabfiltref["nom"] ?>"><?php echo $tabfiltref["nom"] ?></option>
                    <?php endforeach?>
                </select>

            </div>
            <div style="border: 1px solid #ccc;padding: 1%;margin-right: 2%;border-radius: 10px;">
                <input type="date" value="<?= $date = date('Y-m-d'); ?>">
            </div>
            <div
                style="border: 1px solid #ccc;padding: 1%;margin-right: 2%;border-radius: 10px;background-color:green;">
                <input type="submit" value="Rafraichir" style="color:white;background-color:green;">
            </div>
    </form>

</div>
<div class="table">
    <table class="tab-pre">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Référentiel</th>
                <th>Heure_arrivée</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include ("/var/www/html/Project/models/presence.php");
           
           /*  $student = readcsv(); */
           /*  var_dump($student);
            die();
 */
           /*  $tabfiltref = array();
            foreach ($student as $referent) {

                if ($_SESSION["id_promo"] == $referent["id"]) {
                    $tabfiltref[] = $referent;
                }
                
            }
            $student=$tabfiltref; */
            $tabfiltref = array();
            foreach ($student as $referent) {

                if ($_SESSION["id_promo"] == $referent["id"]) {
                    $tabfiltref[] = $referent;
                }

            }
            $student=$tabfiltref;
            if (isset($_POST['status'])) {
                $search = $_POST['status'];
                $weureEtudiant = $student;
                
                if(!empty($search)){
                
                    $weureEtudiant = array_filter($student, function ($studen) use ($search) {
                        if ($studen["status"] == $search) {
                            if (empty($_POST["referentiel"])) {
                                return $studen;
                            } else {
                                if ($_POST["referentiel"] == $studen["referentiel"]) {
                                    return $studen;
                                }
                            }
                        }
                    });
                }

                if (count($weureEtudiant) > 0) {
                    foreach ($weureEtudiant as $student) {
                        echo "<tr>";
                        echo "<td>" . $student["matricule"] . "</td>";
                        echo "<td>" . $student["nom"] . "</td>";
                        echo "<td>" . $student["prenom"] . "</td>";
                        echo "<td>" . $student["telephone"] . "</td>";
                        echo "<td>" . $student["referentiel"] . "</td>";
                        echo "<td>" . $student["heure_arrive"] . "</td>";
                        echo "<td>" . $student["status"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='8'>Aucun apprenant trouvé</td>";
                    echo "</tr>";
                }
            } else {
                $start = 0;
                if (isset($_GET["pageAff"])) {
                    $start = intval($_GET["pageAff"]);
                    if ($start < 0)
                        $start = 0;
                }
                foreach (array_slice($student, $start, $eleByPage) as $student) {
                    echo "<tr>";
                    echo "<td>" . $student["matricule"] . "</td>";
                    echo "<td>" . $student["nom"] . "</td>";
                    echo "<td>" . $student["prenom"] . "</td>";
                    echo "<td>" . $student["telephone"] . "</td>";
                    echo "<td>" . $student["referentiel"] . "</td>";
                    echo "<td>" . $student["heure_arrive"] . "</td>";
                    echo "<td>" . $student["status"] . "</td>";
                    echo "</tr>";
                }
            }


            ?>
        </tbody>
    </table>
    <div class="paginate">
        <div class="suiPre">
            <a class="pre" href="?page=<?= $uri ?>&pageAff=<?= $pageEtu - 1 ?>"> <</a>
        </div>
        <div class="linkPage">
            <?php
            for ($i = 1; $i <= $totalPage; $i++) {
                ?>
                <a href="?page=<?= $uri ?>&pageAff=<?= $i ?>"><?= $i ?> <?php
            }
            ?>
        </div>
        <div class="suiPre">
            <a class="sui" href="?page=<?= $uri ?>&pageAff=<?= $pageEtu + 1 ?>">></a>
        </div>
    </div>
</div>
</div>