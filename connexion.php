<?php
$connect= mysqli_connect("localhost","root","","livreor");

session_start();

// Si le mec clique 
if(isset($_POST['env'])){

    // Si les champs sont remplis
    if(!empty($_POST['login']) && !empty($_POST['password'])){

        // Attribution des valeurs du formulaire ($_POST)
        $login=$_POST['login'];
        $password=$_POST['password'];

        //  Envoie une requête à un serveur MySQL
        $sql = mysqli_query ($connect,"SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'");

        // Retourne une ligne vide ou remplie
        $res = mysqli_fetch_all($sql);
        
        // var_dump($res[0][0]);

        // Si le resultats de la requete de la base de donnée n'est pas vide
        if(!empty($res)){
            echo 'Vous êtes connectés.';
            $_SESSION["id"] = $res[0][0];
            $_SESSION['login'] = $login;
            header ("location:2;url=index.php");   
            }

        // Sinon le resultats de la requete de la base de donnée est vide!!!
        else{
            echo 'Login et/ou mot de passe incorrect.';
        }
    }
    // Si les champs ne sont pas remplis
    else{
        echo 'Remplissez les champs';
    }
}
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
<div class="forum">
    <h1>Connexion</h1>
<form method="post" action="">
    <br>
    <input name="login" type="text" placeholder="Login" />
    <br>
    <br>
    <input name="password" type="password" placeholder="Mot de passe" />
    <br>
    <br>
    <input type=submit value="Connecter" name="env">
</div>
</form>
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