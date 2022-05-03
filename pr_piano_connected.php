<?php session_start();
#réviser les superglobales $_SESSION & $_COOKIE
include_once("pr_piano_header.php"); ?>

<link rel="stylesheet" href="pr_piano_connected.css" />

<h1 class="h1">Vous êtes connecté à l'espace membre</h1>
<!--Mettre le nom dans le titre avec $_SESSION-->
<section class="main">
    <div class="profil">
        <h2 class="h2">Votre profil</h2>
        <p>Nom d'utilisateur : <br />
            Email : <br />
        </p>
    </div>
    <div class="modif">
        <h2 class="h2">Modifier ces informations</h2>
    </div>
</section>

<?php include_once("pr_piano_footer.php"); ?>