<?php
include('header.html');
$userbdd = 'root';
$pwdbdd = '';
try{
    $bdd = new PDO('mysql:host=localhost;dbname=ipssi', $userbdd, $pwdbdd);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

$utilisateur = $_POST['username'];
$pwd = sha1($_POST['password']);
$stmt = $bdd->prepare("INSERT INTO `ipssi`.`user` (`id`, `username`, `password`) VALUES (null, :utilisateur, :pwd)");
$stmt->bindParam(':utilisateur', $utilisateur);
$stmt->bindParam(':pwd', $pwd);
$stmt->execute();
?>
Votre utilisateur a bien été ajouter.
<a href="index.php">Essayer de vous connectez</a>
<?php
include ('footer.html');
?>
