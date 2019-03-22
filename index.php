<?php
$pdo = new PDO('mysql:host=localhost;dbname=abonnes', 'root', '',array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));
if(isset($_POST["mail"])){
    $login = $_POST["mail"];
    $pwd = $_POST["password"];
    $result = $pdo -> query("SELECT id_identification FROM identification WHERE mail='$login' AND password='$pwd'");
    $result -> rowCount();
    $truc = $result -> rowCount();
    $truck = $result -> fetch();
    $id_identification = $truck['id_identification'];
    if ($truc == 1){
        header('Location: article.php?id_identification='.$id_identification);
        exit;
    }
    if ($truc == 0){
        echo "<h3>Connexion échouée ! Veuillez vérifier vos identifiants de connexion.</h3>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Truc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
<h1>Connexion formulaire</h1>
    <form method="POST" action="index.php">
        <input type="text" name="mail" placeholder="Entrez votre email"><br>
        <input type="text" name="password" placeholder="Mot de passe"><br><br>
        <input type="submit"><br><br><br><input type=button onclick=window.location.href='inscription.php'; value=Inscription>
    </form>
</body>

</html>
