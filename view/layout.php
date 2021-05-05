<?php

use App\Core\Session;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= CSS_PATH ?>/style.css">

    <title><?= $title ? " - " . $title : "" ?></title>
</head>

<body>
    <header>
        <nav>
            <a href="?ctrl=home">Accueil des sujets</a>
            <?php if (!Session::get("user")) { ?>
            <a href="?ctrl=security&action=login">Se connecter</a> <?php } ?>
            <?php if (!Session::get("user")) { ?>
            <a href="?ctrl=security&action=register">S'enregistrer</a> <?php } ?>
            <?php if (Session::get("user")) {?>
            <a href="?ctrl=security&action=profile">Mon Profil</a><?php } ?>
            <?php if (Session::get("user")) {?>
            <a href="?ctrl=security&action=logout">Se déconnecter</a><?php } ?>
        </nav>
        <h1>Bienvenu !</h1>
    </header>
    <?php include("messages.php"); ?>
    <div>
        <?= $page //ici s'intègrera la page que le contrôleur aura renvoyé !!
        ?>
    </div>
</body>

</html>