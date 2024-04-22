<?php
  include (YOON."/app/models/connexion.php");
  $erreur = "";
  if($_POST){
    $email = $_POST["email"];
    $password = $_POST["password"];
    if(!empty($email) && !empty($password)){
    
      $logged_admin = array_filter($admins, function ($admin) use ($email,$password) {
        return $admin["email"] == $email && $admin['password'] == $password;
      });
      if(count($logged_admin) >=1){
        $logged_admin = array_values($logged_admin)[0];
        $_SESSION["role"] = "admin";
        $_SESSION["nom"] = $logged_admin["nom"];
        $_SESSION["prenom"] = $logged_admin["prenom"];
        
        header("Location:?page=dash");
      }else{
        $logged_apprenant = array_filter($apprenants, function ($apprenant) use ($email,$password) {
          return $apprenant["email"] == $email && $apprenant['password'] == $password;
        });
       
        if(count($logged_apprenant) >=1){
          $logged_apprenant = array_values($logged_apprenant)[0];
          $_SESSION["role"] = "apprenant";
          
          $_SESSION["nom"] = $logged_apprenant["nom"];
          $_SESSION["prenom"] = $logged_apprenant["prenom"];
          header("Location:?page=dash");

        }else{
          $erreur  =  "Utilisateur non trouvé";
        }
      }
      /* die(); */
    }else{
      $erreur  =  "Veuillez remplir le login et le mot de passe";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulaire de Connexion</title>
<link rel="stylesheet" href="<?=WEBROOT?>/public/css/connexion.css">

</head>
<body>
  
<div class="container-global">
  <div class="container">
    <form action="<?=WEBROOT?>/public/index.php" method="POST">
    <img class="logo" src="<?=PATHIMG?>/logo.jpeg" alt="">
    <div class="login-form">
      <div class="first">
        <?php 
        if(!empty($erreur)){
          echo $erreur;
        }else{
          echo 'Email et Mot de Passe Requis';
        }
        ?>
      </div>
      <label for="email">Adresse Email <span>*</span></label>
      <input type="email" name="email" id="email" placeholder="Entrez votre adresse email*" required>
      <label for="password">Mot de Passe <span>*</span></label>
      <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe*" required>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="remember"> Se souvenir de moi
      </label>
      <a href="#">Mot de passe Oublié?</a>
    </div>
    <button class="btn" type="submit">Login</button>
    </form>
  </div>
</div>

</body>
</html>