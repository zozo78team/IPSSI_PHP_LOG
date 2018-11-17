<?php
include('header.html');
$userbdd = 'root';
$pwdbdd = '';
try{
    $bdd = new PDO('mysql:host=localhost;dbname=ipssi', $userbdd, $pwdbdd);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

$id = $_POST['id'];
$title = $_POST['title'];
$contenu = $_POST['content'];
$stmt = $bdd->prepare("INSERT INTO `ipssi`.`article` (`id`, `title`, `content`, `image`, `author`) VALUES (null, :title, :contenu, '', :id)");
$stmt->bindParam(':title', $title);
$stmt->bindParam(':contenu', $contenu);
$stmt->bindParam(':id', $id);
$stmt->execute();
?>
Votre article a bien été ajouter.
<a href="listeArticle.php">Retour aux articles</a>
<?php
include ('footer.html');
?>