<?php include_once("pr_piano_header.php"); ?>
<link rel="stylesheet" href="pr_piano_jeu.css" />
<h1 class="h1">Mini-jeu<h1>
        <div class="contain">
            <section class="main">
                <p class="p"><b>Bienvenue sur la plateforme de jeu de ce site !</b><br />
                    On vous propose un jeu gratuit, innovant et intuitif qui peut également servir d'entrainement à la lecture de note.<br />
                    Ce jeu n'est malheusement dispponible que sur ordinateur à cause des résolutions qui sont insuffissantes sur téléphone ou tablette.<br />
                    Nous vous proposons plusieurs thèmes de musiques ainsi que des options d'aides pour chaque partition.<br />
                    Pour enregistrer votre score, veuillez vous connecter préalablement à votre espace membre ou vérifier que votre session est active.</p>

            </section>
            <section class="nomain">
                <img src="img/piano_partition.jpg" />
            </section>
        </div>
        <div class="liste">
            <ul>
                <li class="li">
                    <h2 class="h2">Nom_musique_1 - Nom_compositeur_1</h2><br />
                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit libero, impedit dignissimos, dolorem repudiandae temporibus magni totam amet est, rerum iure aut voluptatibus. Nisi consectetur nobis odit, velit aliquam corrupti?</p><br />
                    <div class="options">
                        <input type="checkbox" name="1" id="1" />
                        <label for="1">Activer/Désactiver le nom des notes sur le clavier</label><br />
                        <input type="checkbox" name="2" id="2" />
                        <label for="2">Activer/Désactiver l'aide à la lecture des partitions</label><br /><br />
                        <input class="play" type="submit" value="Jouer (ouverture d'un nouvel onglet du navigateur)" name="playgame" id="playgame" width="100%" />
                    </div>
                </li>
                <li class="li">
                    <h2 class="h2">Nom_musique_2 - Nom_compositeur_2</h2><br />
                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit libero, impedit dignissimos, dolorem repudiandae temporibus magni totam amet est, rerum iure aut voluptatibus. Nisi consectetur nobis odit, velit aliquam corrupti?</p><br />
                    <div class="options">
                        <input type="checkbox" name="3" id="3" />
                        <label for="3">Activer/Désactiver le nom des notes sur le clavier</label><br />
                        <input type="checkbox" name="4" id="4" />
                        <label for="4">Activer/Désactiver l'aide à la lecture des partitions</label><br /><br />
                        <input class="play" type="submit" value="Jouer (ouverture d'un nouvel onglet du navigateur)" name="playgame" id="playgame" width="100%" />
                    </div>
                </li>
            </ul>
        </div>


        <?php include_once("pr_piano_footer.php"); ?>