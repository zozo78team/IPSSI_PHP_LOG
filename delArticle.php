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
$stmt = $bdd->prepare("DELETE FROM `ipssi`.`commentaire` WHERE  article=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$stmt = $bdd->prepare("DELETE FROM `ipssi`.`article` WHERE  id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
?>
    Votre article a été supprimé.
    <a href="listeArticle.php">Retour aux articles</a>
<?php
include ('footer.html');
?>