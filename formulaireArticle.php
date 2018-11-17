<html>
<head>
    Formulaire d'inscription
</head>
<?php
include('header.html');
$userbdd = 'root';
$pwdbdd = '';
try{
    $bdd = new PDO('mysql:host=localhost;dbname=ipssi', $userbdd, $pwdbdd);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>
<body>
<form method="post" action="addArticle.php">
    <label>Utilisateur : </label>
    <select name="id" size="1">
        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=ipssi', 'root', '');
            $stmt = $bdd->query("Select * FROM user");
            $donnee = $stmt->fetchAll();
            foreach ($donnee as $value) {
                ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['username']; ?></option>
                <?php
            }
        ?>
    </select><br>
    <label>Titre : </label><input type="text" name="title" id="title" maxlength="50"/><br>
    <label>Contenu : </label><input type="text" name="content" id="content" maxlength="255"/><br>
    <label>Image</label><br>
    <button type="submit" value="Valider">Ajouter</button>
</form>
</body>
</html>
<?php
include('footer.html');
?>