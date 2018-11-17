<?php
include('header.html');
?>
<form action="connexion.php" method="post">
    <div>
        <label for="user">User :</label>
        <input type="text" id="user" name="user" maxlength="50">
    </div>
    <div>
        <label for="password">Password :</label>
        <input type="password" id="password" name="password" maxlength="30">
    </div>
    <div>
        <button type="submit" value="Valider">Valider</button>
    </div>
</form>
<form action="formulaireUtilisateur.php" method="post">
    <button class="btn btn-info" type="submit" value="Inscription">Inscription</button>
</form>
<?php
include ('footer.html');
?>