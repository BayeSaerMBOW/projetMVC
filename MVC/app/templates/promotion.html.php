

<div class="milieu-po">
    <div class="entete-po">
        <div class="entete1-po">Promotions</div>
        <div class="entete2-po" style="font-size: .8rem;">Promos*Liste</div>
    </div>
    <div class="promo_list">
        <div class="text-number">
            <div class="promo_list_title">Liste Des Promotions</div>
            <div class="promo_list_number" style="left: 22%;">(1)</div>
        </div>
        <div class="search_bar" style="position: absolute;display: flex; align-items: center;height: 15%;width: 20%; border-radius: 0.2vw;left: 65%; top: 8%;">
            <input class="text-rech" type="text" placeholder="Rechercher ici..." style="position: absolute; left: 1%; width: 86%;">
            <i style="position: absolute; left: 80%;" class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="new_button">+ Nouvelle
            <a href="?page=pro1" style="width: 100%;position: absolute;height: 100%;z-index: 1;"></a>
        </div>
        <table class="class-prom">
            <thead>
                <tr>
                    <th>Libele</th>
                    <th>Date debut</th>
                    <th>Date fin</th>
                    <th>Etat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
               $promos=readpocsv();
                           
            foreach ($promos as $promo) 
                { ?>
                
                <tr>
                    <td style="color:green;"><?php echo $promo["libelle"]; ?></td>
                    <td><?php echo $promo["date_debut"]; ?></td>
                    <td><?php echo $promo["date_fin"]; ?></td>
                    <td>
                        <?php echo $promo['etat'] ?> 
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" value="pro" name="page">
                            <input type="hidden" name="changeId" value="<?=$promo['id'] ?>">
                            <button class="btneditpromo" type="submit" style="width:100%;background-color:transparent;border:none;width:2vw;heigth:2vh">
                                <i class="<?= $promo['etat'] === 'activer' ? "fa-sharp fa-thin fa-square-check editicon fa-solid" : "fa-sharp fa-thin fa-square editicon fa-solid"?>"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>