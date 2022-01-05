<?php

session_start();

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


<?php
$connect= mysqli_connect("localhost","root","","livreor");

$cont=mysqli_query($connect,"SELECT commentaires , date , login FROM commentaires INNER JOIN utilisateurs ON id_utilisateur = utilisateurs.id");
$contenu =mysqli_fetch_all($cont,MYSQLI_ASSOC);    

?>

<main>

<div class=tableau>
<table border=1>
       <thead>

    <?php

        echo "<tr>";
        foreach ($contenu[0] as $row =>$ligne){
        echo "<th>",$row,"</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($contenu as $conte => $value){
        echo "<tr>";
        foreach($value as $conte2 => $value2){
        echo "<td>",$value2,"</td>";

        }
        echo"</tr>";
        }
        echo"</tbody>";
        echo "</table>";

    ?>
</div>

</main>

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