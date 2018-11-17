<?php
include('header.html');
$userbdd = 'root';
$pwdbdd = '';
try{
    $bdd = new PDO('mysql:host=localhost;dbname=ipssi', $userbdd, $pwdbdd);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

$idArt = $_POST['id'];
$stmt = $bdd->prepare("SELECT * FROM article WHERE id=:idArt");
$stmt->bindParam(':idArt', $idArt);
$stmt->execute();
$articles = $stmt->fetchAll();
foreach ($articles as $article){

    ?>
    <html>
        <body>
            Titre : <?php echo $article['title']; ?><br>
            Contenu : <?php echo $article['content']; ?><br>
        <?php }
    $stmt = $bdd->prepare("SELECT * FROM commentaire WHERE article=:idArt");
    $stmt->bindParam(':idArt', $idArt);
    $stmt->execute();
    $comments = $stmt->fetchAll();
    foreach ($comments as $comment){
        ?>
        Commentaires :<br>
        <?php
        echo $comment['username']." : \t";
        echo $comment['content'];
        } ?><br>
        <form action="addCommentaire.php" method="post">
            <input type="text" id="user" name="user" placeholder="Username">
            <input type="text" id="comment" name="comment" placeholder="Commentaire">
            <input hidden name="idArt" id="idArt" value="<?php echo $idArt; ?>">
            <button type="submit" value="Ajouter un commentaire">Ajouter un commentaire</button>
        </form>
        </body>
    </html>
<?php
include ('footer.html');
?>