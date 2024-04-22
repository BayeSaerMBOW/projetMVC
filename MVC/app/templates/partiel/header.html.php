<div class="haut">
    <div class="left">
        <i class="fa-solid fa-bars"><input class="check" type="checkbox"></i>
        <i class="fa-solid fa-bars"></i>
        <div class="search">
            <form class="form-envoi"  action="" method="POST">
                <!--  <input type="hidden" >  -->
                <input type="text" name="search" placeholder="Rechercher par matricule">
                <i class="fa-solid fa-magnifying-glass"><input type="submit" ></i>
            </form>
        </div>
    </div>
    <div class="right">
        <div class="date">
            <i class="fa-solid fa-calendar-days"></i>
            <input type="text" placeholder="20 March 2024">
        </div>

         <div class="imgLogin"> 

        <div class="img">
            <img src="<?=PATHIMG?>/saer.jpg" alt="" width="40px" height="40px"
                style="background-color: grey;border-radius: 50%;">
        </div>
        
        <div class="login">
            <div style="color: #008F87;"><?= $_SESSION['nom']." ".$_SESSION['prenom'] ?></div>
            <div>
                <?= $_SESSION["role"] ?>
            </div>
            <a href="<?=WEBROOT?>/public/index.php?page=logout">
                <i class="fa fa-lock"></i> Se déconecter
            </a>
        </div>
        </div> 
    </div>
</div>
