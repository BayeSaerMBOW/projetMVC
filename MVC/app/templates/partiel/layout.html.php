<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion etudiants ODC</title>
    <link rel="stylesheet" href="<?=WEBROOT?>/public/css/main.css">
    <link rel="stylesheet" href="<?=WEBROOT?>/public/css/presence.css">
    <link rel="stylesheet" href="<?=WEBROOT?>/public/css/<?=$page?>.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php include_once(YOON."/app/templates/partiel/header.html.php"); ?>
<?php include_once(YOON."/app/templates/partiel/side-bar.html.php"); ?>
<div class="issa-home"> 
    <?php include_once(YOON."/app/templates/".$page.".html.php"); ?>
</div>
<?php include_once(YOON."/app/templates/partiel/footer.html.php"); ?>
</body>
</html>