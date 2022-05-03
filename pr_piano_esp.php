<?php include_once("pr_piano_header.php"); ?>
<link rel="stylesheet" href="pr_piano_esp.css" />

<?php

$link = mysqli_connect('localhost', 'root', '', 'piano');
if (mysqli_connect_errno()) {
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset($link, 'utf8');

if (isset($_POST["coSubmit"])) {
    $user = htmlspecialchars($_POST["userForLog"]);
    $mail = htmlspecialchars($_POST["userForLog"]);
    $pass = htmlspecialchars($_POST["passForLog"]);
    echo "test1_var" . $user . $mail . $pass . '<br />'; #---------------------------------------------------1    Test des var & sécurité & hash SUCCESS
    $sql_user = "SELECT user FROM profil WHERE user='$user';";
    $sql_mail = "SELECT mail FROM profil WHERE mail='$mail';";
    $test_user = mysqli_query($link, "$sql_user");
    $test_mail = mysqli_query($link, "$sql_mail");
    if (mysqli_num_rows($test_user) == 1 || mysqli_num_rows($test_mail) == 1) {
        echo "test2_user||mailExist" . '<br />'; #---------------------------------------------------2     Test user/mail exist SUCCESS   
        $sql_user_pass = "SELECT pass FROM profil WHERE user='$user';";
        $sql_mail_pass = "SELECT pass FROM profil WHERE mail='$user';";
        $test_user_pass = mysqli_query($link, "$sql_user_pass");
        $test_mail_pass = mysqli_query($link, "$sql_mail_pass");
        while ($row_user_pass = mysqli_fetch_assoc($test_user_pass)) {
            $user_pass = $row_user_pass["pass"];
        }
        while ($row_mail_pass = mysqli_fetch_assoc($test_mail_pass)) {
            $mail_pass = $row_mail_pass["pass"];
        }
        if (password_verify($pass, $user_pass) || password_verify($pass, $mail_pass)) {
            echo "Le mot de passe correspond !";
            header('Location: pr_piano_connected.php');
        }
    } else {
        echo "Le nom d'utilisateur ou l'addresse e-mail est incorrect !";
    }
}

if (isset($_POST["inSubmit"])) {
    $user_sign = htmlspecialchars($_POST["userForSign"]);
    $sql_user_sign = "SELECT user FROM profil WHERE user='$user_sign';";
    $test_user_sign = mysqli_query($link, "$sql_user_sign");
    $mail_sign = htmlspecialchars($_POST["mailForSign"]);
    $sql_mail_sign = "SELECT mail FROM profil WHERE mail='$mail_sign';";
    $test_mail_sign = mysqli_query($link, "$sql_mail_sign");
    if (mysqli_num_rows($test_mail_sign) == 1 && mysqli_num_rows($test_user_sign) == 1) {
        echo "Le nom d'utillisateur et le mail sont déjà utilisé !";
    } else if (mysqli_num_rows($test_user_sign) == 1) {
        echo "Le nom d'utilisateur est déjà utilisé !";
    } else if (mysqli_num_rows($test_mail_sign) == 1) {
        echo "Le mail est déjà utilisé !";
    } else if (!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $mail_sign)) {
        echo "L'addresse e-mail que vous avez indiqué n'est pas valide !";
    } else {
        $pass1 = htmlspecialchars($_POST["passForSign1"]);
        $pass2 = htmlspecialchars($_POST["passForSign2"]);
        echo $pass1 . '<br />' . $pass2 . '<br />'; #---------------------------------------------------3      Test var pass FAILED
        if ($pass1 != $pass2) {
            echo "Les mots de passe ne correspondent pas !";
        } else {
            $hash_sign = password_hash($pass1, PASSWORD_DEFAULT);
            $sql_inscrit = "INSERT INTO profil (user, mail, pass) VALUES ('$user_sign', '$mail_sign', '$hash_sign');";
            echo $sql_inscrit . '<br />'; #---------------------------------------------------4       Test vérif requête SUCCESS
            mysqli_query($link, "$sql_inscrit");
            echo "Votre inscription a bien été enregistrée dans notre base de données !";
        }
    }
}


?>

<h1 class="h1">Espace membres</h1>
<div class="allform">
    <div class="connexion">
        <h2 class="h2">Connexion</h2>
        <form class="form" action="pr_piano_esp.php" method="post">
            <label for="userForLog" class="label">Nom d'utilisateur ou e-mail</label><br />
            <input type="text" name="userForLog" id="userForLog" placeholder="Utilisateur/E-mail" required /><br />
            <label for="passForLog" class="label">Mot de passe</label><br />
            <input type="password" name="passForLog" id="passForLog" placeholder="Mot de passe" required /><br /><br />
            <input name="coSubmit" class="button" type="submit" value="Se connecter" />
        </form>
    </div>
    <div class="text">
        <h3 class="h3">Pas encore inscrit ? Inscrivez-vous simplement avec votre addresse mail ! Voir nos <a href="others/conditions_generales_utilisations.pdf">Conditions d'utilisations.</a></h3>
        <img class="img" src="img/piano_maison.jpg" width="200px" height="200px" />
    </div>
    <div class="inscription">
        <h2 class="h2">Inscription</h2>
        <form class="form" action="pr_piano_esp.php" method="post">
            <label for="userForSign" class="label">Nom d'utilisateur</label><br />
            <input type="text" name="userForSign" id="userForSign" placeholder="Utilisateur" required /><br />
            <label for="mailForSign" class="label">Mail</label><br />
            <input type="text" name="mailForSign" id="mailForSign" placeholder="E-mail" required /><br />
            <label for="passForSign1" class="label">Mot de passe</label><br />
            <input type="password" name="passForSign1" id="passForSign1" placeholder="Mot de passe" required /><br />
            <label for="passForSign2" class="label">Confirmation de mot de passe</label><br />
            <input type="password" name="passForSign2" id="passForSign2" placeholder="Confirmation de mot de passe" required /><br /><br />
            <div class="check">
                <input type="checkbox" name="agree" id="agree" required />
                <label for="agree" class="sublabel">J'ai lu et j'accepte les <a href="others/conditions_generales_utilisations.pdf"> Conditions d'utilisations.</a></label><br />
            </div>
            <input name="inSubmit" class="button" type="submit" value="S'inscrire" />
        </form>
    </div>
</div>
<?php include_once("pr_piano_footer.php"); ?>