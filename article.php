
<?php

$bdd = new PDO('mysql:host=localhost;dbname=abonnes', 'root', '',array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));
$id_identification = $_GET['id_identification'];

$result = $bdd -> query("SELECT nom, prenom FROM identification WHERE id_identification = '$id_identification'");
$tabResult = $result -> fetch();
$nom = $tabResult['nom'];
$prenom = $tabResult['prenom'];

if(isset($_POST["titre"])) {
    $titre = $_POST["titre"];
    $art = $_POST["art"];
    $bdd -> query("INSERT INTO article (id_identification, titre, date_parution, art) VALUES ('$id_identification','$titre',CURDATE(),'$art')");
    echo "<h3>Article ajouté !</h3>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>

<body>
<h4><?php echo "Bonjour, $nom $prenom !"; ?></h4>
    <h1>Ajouter un article</h1>
    <form method="POST" action="article.php">
        <input type="text" name="titre" placeholder="Titre">
        <textarea name="art" placeholder="Article"></textarea>
        <select name="rubrique">
        <option selected disabled>Categorie</option>
        <option value="culture_pop">Culture_pop</option>
        <option value="sport">Sport</option>
        <option value="cuisine">Cuisine</option>
        <option value="actualite">Actualite</option>
        <option value="mode">Mode</option>
        <option value="tuning">Tuning</option>
        </select><br>
        <input type="submit">
    </form>
</body>

</html>

