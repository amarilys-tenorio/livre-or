<?php

session_start();
$id = $_SESSION["id"];
$bdd= mysqli_connect("localhost","root","","livreor");
$req= mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE id = $id");
$res= mysqli_fetch_all($req,MYSQLI_ASSOC);
$login = $res[0]['login'];
$password = $res[0]['password']; 

if (isset($_POST['env']))
{
    $password1 = $_POST['password'];
    $login1 = $_POST['login'];
    if($login1 !='admin')
    $req2= mysqli_query($bdd,"UPDATE utilisateurs SET login='$login1', password='$password1' WHERE  id = $id ");
    header("Location: profil.php");
} 

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
        <form name="salut" action="" method="post">
            <label class="input1" for="login">Pseudo</label>
            <input name="login" value="<?php echo $login?>" type="text" placeholder="username" />

            <label class="label" for="password">Mot de passe</label>
            <input class="inpute" value="<?php echo $password?>" name="password" type="password"
                placeholder="Ton mdp" />

            <input class="env" name="env" type="submit" Envoyer />
            
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