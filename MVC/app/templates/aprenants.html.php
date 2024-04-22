<div class="milieu-ap">
    <div class="entete-ap">
        <div>Apprenants </div>
        <div class="entete2" style="font-size: .8rem;">Promos>List>Details>Apprenants</div>
    </div>
    <div class="conteneur">
        <div class="contain1">
            <span>Promotion:<span>Promotion6</span></span>
           
        </div>
        <div class="contain2">
            <span>Referentiel:</span>
            <span>
            <form action="" method="post">
            <select name="referentiel" id="">
                 <!-- <option value="status">referentiel</option> -->
                    <?php foreach($_SESSION["tabfiltref"] as $tabfiltref):?>
                    <option value="<?php echo $tabfiltref["nom"] ?>"><?php echo $tabfiltref["nom"] ?></option>
                    <?php endforeach?>
                </select>
                  <!-- <input type="submit" value="Rafraichir"> -->
                </form>
            </span>
        </div>
    </div>
    <div class="form-ap">
        <input type="hidden">
        <div class="promo3">
            <div class="span3">1</div>
            <div>Apprenants</div>
        </div>
        <div class="cont">
            <div>liste des Apprenants(50)</div>
            <div class="forbut">
                <div style="background-color: #008F87; color: #FFFFFF; display:flex;justify-content:center;align-items:center;border-radius:10px;"> <a href="">+Nouveau</a></div>
                <div style="background-color: #FF8903; color: #FFFFFF;display:flex;justify-content:center;align-items:center;border-radius:10px;"><a href="">insertion en masse</a></div>
                <div style="background-color: #0083A9; color: #FFFFFF;display:flex;justify-content:center;align-items:center;border-radius:10px;"><a href="">fichier modele</a></div>
                <div style="background-color: #0B41A1; color: #FFFFFF;display:flex;justify-content:center;align-items:center;border-radius:10px;"><a href="">liste des exclus</a></div>
            </div>
        </div>
        <form class="filter" method="post" name="filter">
            <input href="search" name="search" id="input" placeholder="filtrer" value="<?php echo isset($_POST['search']) ?
                                                                                            htmlspecialchars($_POST['search']) : ''; ?>">
        </form>

        <div class="table-ap">
            <table class="tab-ap">

                <thead>
                    <tr>
                        <th><a href="">Image</a></th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</thdisplay:flex;justify-content:center;align-items:center;border-radius:10px;>
                        <th>Genre</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include(' /var/www/html/Project/app/models/aprenants.php');
                    $tabfiltref = array();
                    foreach ($students as $referent) {
                        
                        if ($_SESSION["id_promo"] == $referent["id"]) {
                            $tabfiltref[] = $referent;
                        }
                    }
                    if (isset($_POST['search'])) {
                        $search = $_POST['search'];

                        $weureEtudiant = array_filter($tabfiltref , function ($student) use ($search) {
                            return strpos(strtolower($student['nom']), strtolower($search)) !== false ||
                                strpos(strtolower($student['prenom']), strtolower($search)) !== false ||
                                strpos(strtolower($student['email']), strtolower($search)) !== false ||
                                strpos(strtolower($student['genre']), strtolower($search)) !== false ||
                                strpos(strtolower($student['telephone']), strtolower($search)) !== false ||
                                strpos(strtolower($student['action']), strtolower($search)) !== false;
                        });
                        // var_dump($weureEtudiant);
                        // die();
                        if (count($weureEtudiant) > 0) {
                            foreach ($weureEtudiant as $student) {
                                echo "<tr>";
                                echo "<td>" . $student["image"] . "</td>";
                                echo "<td>" . $student["nom"] . "</td>";
                                echo "<td>" . $student["prenom"] . "</td>";
                                echo "<td>" . $student["email"] . "</td>";
                                echo "<td>" . $student["genre"] . "</td>";
                                echo "<td>" . $student["telephone"] . "</td>";
                                echo "<td>" . $student["action"] . "</td>";
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
                            if ($start < 0) $start = 0;
                        }
                        foreach (array_slice($tabfiltref, $start, $eleByPage) as $student) {
                            echo "<tr>";
                            echo "<td>" . $student["image"] . "</td>";
                            echo "<td>" . $student["nom"] . "</td>";
                            echo "<td>" . $student["prenom"] . "</td>";
                            echo "<td>" . $student["email"] . "</td>";
                            echo "<td>" . $student["genre"] . "</td>";
                            echo "<td>" . $student["telephone"] . "</td>";
                            echo "<td>" . $student["action"] . "</td>";
                            echo "</tr>";
                        }
                    }

                    ?>
                </tbody>
            </table>
            <div class="paginate">
                <div class="suiPre">
                    <a class="pre" href="?page=<?= $uri ?>&pageAff=<?= $pageEtu - 1 ?>">
                        <
                </div>
                <div class="linkPage">
                    <?php
                    for ($i = 1; $i <= $totalPage; $i++) {
                    ?>
                        <a href="?page=<?= $uri ?>&pageAff=<?= $i ?>"><?= $i ?></a>
                    <?php
                    }
                    ?>
                </div>
                <div class="suiPre">
                    <a class="sui" href="?page=<?= $uri ?>&pageAff=<?= $pageEtu + 1 ?>">></a>
                </div>
            </div>

        </div>
    </div>
</div>