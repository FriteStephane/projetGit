
<?php

/*
$mysqli = new Mysqli('localhost', 'root', '', 'entreprise');*/

$bdd = new PDO('mysql:host=localhost;dbname=abonnes', 'root', '',array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));
/////////////////// NOM /////////////////////////
if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["password"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail = $_POST["mail"];
    $mdp = $_POST["password"];
    $bdd -> query("INSERT INTO identification (nom, prenom, mail, password) VALUES ('$nom','$prenom','$mail','$mdp')");
    echo "<h3>Nouveau compte créé avec succès !</h3>";
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<h1>Inscription</h1>
    <form method="POST" action="inscription.php">
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="prenom" placeholder="prenom">
        <input type="text" name="mail" placeholder="mail">
        <input type="text" name="password" placeholder="mot de passe">
        <input type="submit"><br><br>
        <input type=button onclick=window.location.href='index.php'; value=Connexion>
    </form>
</body>

</html>

