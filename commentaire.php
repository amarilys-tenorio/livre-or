<?php
$connect= mysqli_connect("localhost","root","","livreor");

session_start();

if (!isset($_SESSION['login'])){

    header("Refresh: 3; url=connexion.php");
    $erreur = "Vous devez être connecté pour accéder à cette page. <br> Redirection vers la page de connexion en cours...";

}


if (!$connect){

    $erreur = "Connexion à la base de données non établie.";
    exit;

}
// var_dump($_POST);
if (isset($_POST['valider'])){

    echo("ok");
    $commentaire = $_POST['commentaire'];
    $sqlid = mysqli_query($connect, "SELECT id FROM utilisateurs WHERE login = '".$_SESSION['login']."'");
    $resultid = mysqli_fetch_assoc($sqlid);
    $id_utilisateur = $resultid['id'] ;
    var_dump($resultid);
    echo('test');
    $resultat = mysqli_query($connect, "INSERT INTO commentaires (commentaires, id_utilisateur, date) VALUES ('".$commentaire."','".$id_utilisateur."',now())");
    var_dump($resultat);
    if (empty($commentaire)){

        $erreur = "Le champ commentaire est vide.";

    }

    else {
        
        if ($resultat){

            $confirm = "Commentaire ajouté avec succès !";

        }
    }
} 

if (isset($_POST['deconnexion'])){
    
    session_destroy();
    header("Refresh: 0; url=connexion.php");
    
} ?>

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

    <section id="section_main">
    <h1 id="titre_main">Ajouter un commentaire</h1>
 
    <section class="messages">
        <?php if (isset($confirm)) {echo $confirm;} ?>
    </section>

    <section class="messages">
        <?php if(isset($erreur)) {echo $erreur ;} ?>
    </section>

    <form action="commentaire.php" method="post">

    <label for="commentaire"> Commentaire à ajouter : </label>
    <input type="text-area" name="commentaire" style="height:50px">
    <br>
    <button id="bouton_form" type="submit" name="valider"> Ajouter votre commentaire </button>

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