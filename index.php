<?php 
// Sauvegarde mes variables de session (on reste donc connecté si on change de page)
session_start();

// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rock+3D&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@500&display=swap" rel="stylesheet">
    <title>LIVRE D'OR</title>
</head>

<body>

<header>
    <h1>Galeries Lafayette</h1>    
    <div id="navBar">
        <?php
            if(isset($_SESSION["id"])){
                echo "<a href='profil.php'>Profil.</a>";
                echo "<a href='commentaire.php'>Ajouter son commentaire.</a>";
                echo "<a href='livre-or.php'>Voir le Livre d'Or.</a>";
                echo "<a href='deconnexion.php'>Deconnexion.</a>";
                echo "<a href='https://github.com/amarilys-tenorio/livre-or.git'>Lien Github.</a>";
            }
            else{
                echo "<a href='connexion.php'>Connexion.</a>";
                echo "<a href='inscription.php'>Inscription.</a>";
                echo "<a href='livre-or.php'>Voir le Livre d'Or.</a>";
                echo "<a href='https://github.com/amarilys-tenorio/livre-or.git'>Lien Github.</a>";
            }
        ?>
    </div>
</header>

<main>

    <p><br><br>Hello, welcome to the Galerie Lafayette guestbook.<br>
    Share your experience with us and tell us how we can improve.<br>
    To shop online, click here.</p>

</main>
<br>
<footer>
    <div id="navBar">
        <?php
            if(isset($_SESSION["id"])){
                echo "<a href='profil.php'>Profil.</a>";
                echo "<a href='commentaire.php'>Ajouter son commentaire.</a>";
                echo "<a href='livre-or.php'>Voir le Livre d'Or.</a>";
                echo "<a href='deconnexion.php'>Deconnexion.</a>";
                echo "<a href='https://github.com/amarilys-tenorio/livre-or.git'>Lien Github.</a>";
            }
            else{
                echo "<a href='connexion.php'>Connexion.</a>";
                echo "<a href='inscription.php'>Inscription.</a>";
                echo "<a href='livre-or.php'>Voir le Livre d'Or.</a>";
                echo "<a href='https://github.com/amarilys-tenorio/livre-or.git'>Lien Github.</a>";
            }
        ?>
    </div>
</footer>

</body>
</html>



