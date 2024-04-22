
<div class="milieu4-4">
                <div class="entete4">
                    <div class="">Réferentiels</div>
                    <div class="entete2" style="font-size: .8rem;">Réference*liste</div>
                </div>
                <div class="list-ref">
                    <div class="cards">
                        <?php 
                        foreach($_SESSION["tabfiltref"] as $referentiels) { 
                            // if($referentiels["etat"] =="Active"){?>
                        <div class="card">
                            <span>...</span>
                           <a href="?page=app" >
                                <input type="hidden" name="classe" value="<?$referentiels['idpro'] ?>">
                                <input type="hidden" name="id_ref" value="<?$referentiels['nom'] ?>">
                                <button type="submit"><img style="width: 200px;height: 150px;" src="<?= PATHIMG ?>/classe.jpg" alt=""></button>
                                </form>
                                <div class="ref">
                                <span><?= $referent[''] ?></span> <br>
                                <span class="Active"><?= $referentiels['etat'] ?></span>
                                <a href="referentiel/<?= $referentiels['nom'] ?>"></a>
                            </a>
                            <p style="font-weight: 600;"><?= $referentiels['nom'] ?></p>
                            <p style="color: green;"><?= $referentiels['etat'] ?></p>    
                        </div> 
                        
                        <?php  } 
            
            ?>
                    </div>
                    <div class="new-ref">
                        <div class="formulaire">
                            <span>Nouveau Référentiel</span>
                            <label for="">libelle</label>
                            <input type="text" placeholder="Entrez le libelle">
                            <label for="">Description</label>
                            <input type="text" placeholder="Entrez la description">
                            <button type="submit">Enregistrer</button>
                        </div>
                    </div>
                </div>
</div>