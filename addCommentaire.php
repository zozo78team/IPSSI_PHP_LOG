<?php
include('header.html');
$userbdd = 'root';
$pwdbdd = '';
try{
    $bdd = new PDO('mysql:host=localhost;dbname=ipssi', $userbdd, $pwdbdd);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

$username = $_POST['user'];
$comment = $_POST['comment'];
$idArt = $_POST['idArt'];
$stmt = $bdd->prepare("INSERT INTO `ipssi`.`commentaire` (`id`, `username`, `content`, `article`) VALUES (null, :username, :comment, :idArt)");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':comment', $comment);
$stmt->bindParam(':idArt', $idArt);
$stmt->execute();
?>
Vous avez ajouter un commentaire sur cet article.
<a href="listeArticle.php">Voir tout les articles</a>
<?php
include ('footer.html');
?>
