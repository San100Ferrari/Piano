<?php include_once("pr_piano_header.php"); ?>
<link rel="stylesheet" href="pr_piano_contact.css" />

<?php

$link = mysqli_connect('localhost', 'root', '', 'piano');
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset($link, 'utf8');

if (isset($_POST["submit"])) {
    $user = htmlspecialchars($_POST["userContact"]);
    $mail = htmlspecialchars($_POST["mailContact"]);
    $msg = htmlspecialchars($_POST["msgContact"]);
    echo $user . $mail . $msg . '<br />'; #---------------------------------------------------1    Test de la var et de la sécurité SUCCESS
    $user_true = "SELECT * FROM profil WHERE user='$user';";
    $bdd_user_true = mysqli_query($link, "$user_true");
    var_dump($bdd_user_true) . '<br />'; #---------------------------------------------------2    Test afficher la var SUCCESS
    if (mysqli_num_rows($bdd_user_true) == 1) {
        echo "userExist" . '<br />'; #---------------------------------------------------3    Test permettant de savoir si user exist SUCCESS
        $mail_true = "SELECT mail FROM profil WHERE user='$user';";
        $bdd_mail = mysqli_query($link, "$mail_true");
        while ($row_mail = mysqli_fetch_assoc($bdd_mail)) {
            $bdd_mail_true = $row_mail["mail"];
        }
        if ($bdd_mail_true == $mail) {
            echo "le mail indiqué correspond à cet user : " . $bdd_mail_true . "=" . $mail . '<br />'; #---------------------------------------------------4    Test mail = user SUCCESS
            #écrire les insert into ici
            $request_membre = "INSERT INTO contact (user, mail, msg) VALUES ('$user','$mail','$msg');";
            mysqli_query($link, $request_membre);
            echo "Votre message a bien été transmis ;-)";
        } else {
            echo "Votre nom d'utilisateur et e-mail ne correspondent pas, veuillez vérifier vos informations ou écrivez le message en anonyme." . '<br />'; #---------------------------------------------------5   Test msg error 
        }
    } else {
        #écrire les insert into ici
        $request_anonyme = "INSERT INTO contact (msg) VALUES ('$msg');";
        mysqli_query($link, $request_anonyme);
        echo "Votre message a bien été transmis ;-)";
    }
}


?>

<h1 class="h1">Contact</h1>
<main class="main">
    <div class="containp">
        <p class="p1">
            Des commentaires, des avis pour améliorer le site ?
            <hr />
        </p>
        <p class="p2">Cette page de contact permet de me contacter.
            Vous pouvez m'envoyer un mail à l'addresse indiquée.
            Ou alors vous pouvez remplir un message dans le formaulaire en anonyme ou remplir les cases nom d'utilisateur et e-mail.
        </p>
        </p>
    </div>
    <div class="contact">
        <div class="sectionform">
            <h2 class="h2">Me contacter par un formulaire</h2>
            <form class="form" method="post" action="pr_piano_contact.php">
                <label for="userContact" class="label">Nom d'utilisateur</label><br />
                <input name="userContact" id="userContact" type="text" placeholder="Username" /><br />
                <label for="mailContact" class="label">E-mail</label><br />
                <input name="mailContact" id="mailContact" type="text" placeholder="E-mail" /><br />
                <label for="msgContact" class="label">Message</label><br />
                <input name="msgContact" id="msgContact" type="textarea" required placeholder="Message" /><br /><br />
                <input type="submit" name="submit" class="button" value="Envoyer" /><br />
            </form>
        </div>
        <div class="mailcontact">
            <h2 class="h2">Me contacter par mail</h2>
            <p class="p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, minima veritatis ratione cupiditate corrupti rem quam quo facere ipsa maxime expedita ipsum consequuntur natus dolorum deserunt est! Cupiditate, modi soluta!</p>
        </div>
    </div>
</main>

<?php include_once("pr_piano_footer.php"); ?>