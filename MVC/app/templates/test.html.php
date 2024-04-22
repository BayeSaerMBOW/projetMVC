!-- Formulaire de selection de referentiel -->

                <form method="post" class="select-mutiple">
                    <input type="hidden" name="select">
                    <div class="select-label flex-sbc">
                        <span class="selected-lbl">Referentiel</span>
                        <span class="icon"><i class='bx bx-chevron-down'></i></span>
                        <input type="checkbox" id="selected" onchange="test(this);">
                    </div>
                    <div class="select-content">
                    <?php foreach ($refactifs as $refactif) : ?>
                        <div class="option">
                            <input type="checkbox" name="<?=$refactif['libelle'] ?>">
                            <span class="label"><?=$refactif['libelle'] ?></span>
                        </div>
                        <?php endforeach; ?>
                        
                    </div>
                </form>

                <form action="" method="post">
            <select name="referentiel" id="">
                 <!-- <option value="status">referentiel</option> -->
                    <?php foreach($_SESSION["tabfiltref"] as $tabfiltref):?>
                    <option value="<?php echo $tabfiltref["nom"] ?>"><?php echo $tabfiltref["nom"] ?></option>
                    <?php endforeach?>
                </select>
                  <!-- <input type="submit" value="Rafraichir"> -->
                </form>
          

<!-- Fonction pour recuperer plusieurs referentiels -->

<?php

?>

<!-- CSS du formulaire -->

<style>

</style>