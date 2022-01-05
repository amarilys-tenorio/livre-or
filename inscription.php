<?php

$connect= mysqli_connect("localhost","root","","livreor");

if (isset($_POST['env']))
{
  $password = $_POST['password'];
  $login = $_POST['login'];
  $conf = $_POST['conf']; 

  if (!empty($password) && !empty($login)) {
    $sql=mysqli_query ($connect,"SELECT * FROM utilisateurs WHERE login='$login'"); 
    $res= mysqli_fetch_all($sql);
    if (count($res) == 0)
      if ($password == $conf) {
        echo 'Bienvenue! Vous allez être redirigé vers la page de connexion.';
        $req= mysqli_query($connect,"INSERT INTO utilisateurs (login,password)
        VALUES('$login','$password')");
        $_SESSION['login'] = $login;
$delai = 2; 
    $url = 'http://localhost/livreor/connexion.php';
    header("Refresh: $delai;url=$url");

  }
  
  else {echo 'Les mots de passes ne correspondent pas.';}
  else {echo 'Ce compte existe deja, essaye un autre login.';}
  } 
  else {echo 'Tout les champs doivent etre remplis.';}
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
    <h1>Inscription</h1>
      
      <div class="inscri">
      <form name="formu" action="" method="post">
      <br>
      <input name="login" type="text" placeholder="Username."/>
      <br>
      <br>
      <input name="password" type="password" placeholder="Ton mot de passe."/>
      <br>
      <br>
      <input name="conf" type="password" placeholder="Confime ton mot de passe." />
      <br>
      <br>
<input name="env" type="submit" placeholder="Envoyer">
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