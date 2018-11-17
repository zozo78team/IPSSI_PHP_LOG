<?php
include ('header.html');
$userbdd = 'root';
$pwdbdd = '';
try{
$bdd = new PDO('mysql:host=localhost;dbname=ipssi', $userbdd, $pwdbdd);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
$test = 0;
$utilisateur = $_POST['user'];
$pwd = sha1($_POST['password']);
$stm = $bdd->query("SELECT * FROM user");
$user = $stm->fetchAll();
foreach ($user as $var){
    if ($var['username']==$utilisateur && $var['password']==$pwd){
        $test = 1;
    }
}
if($test==1){
    echo "<h3>Vous êtes bien connecté, pour allez visiter le blog </h3>";?><a href="listeArticle.php">cliquer ici</a> <?php
}else{
    echo "<h2>Impossible de ce connecter à la base de donnée remetter votre user et mdp</h2>";
    ?>
    <a href="index.php">Retour</a>
<?php
}
include('footer.html');
?>