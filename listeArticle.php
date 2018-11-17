<?php
include('header.html');
$userbdd = 'root';
$pwdbdd = '';
try{
    $bdd = new PDO('mysql:host=localhost;dbname=ipssi', $userbdd, $pwdbdd);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

$stmt = $bdd->query("SELECT * FROM article ");
$donnee = $stmt->fetchAll();
foreach ($donnee as $article){
    echo "<h2>Article ".$article['id'].'<br></h2>';
    echo $article['title']."<br>";
    echo $article['content']."<br>";
    echo $article['image']."<br>";
    $stm = $bdd->prepare("SELECT username FROM user WHERE id=:id");
    $stm->bindParam(':id', $article['id']);
    $stm->execute();
    $user = $stm->fetchAll();
    foreach ($user as $nomUser){
        echo $nomUser['username']."<br><br>";
    }
    ?>
    <form method="post" action="article.php">
        <input hidden name="id" id="id" value="<?php echo $article['id'];?>">
        <button type="submit" value="Voir article">Voir l'article</button>
    </form>
    <form method="post" action="delArticle.php">
        <input hidden name="id" id="id" value="<?php echo $article['id'];?>">
        <button class="btn btn-danger" type="submit" value="Supprimer article">Supprimer l'article</button>
    </form>
    <?php
}

?>
<a href="formulaireArticle.php" class="btn btn-primary">Ajouter un article</a>
<?php
include('footer.html');
?>