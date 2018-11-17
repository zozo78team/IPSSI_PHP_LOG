<html>
<?php
    include ('header.html');
?>
<head>
    Formulaire d'inscription
</head>
<body>
<form method="post" action="addUser.php">
    <label>Username : </label><input type="text" name="username" id="username" maxlength="50"/><br>
    <label>Password : </label><input type="password" name="password" id="password" maxlength="50"/><br>
    <button type="submit" value="Valider">Ajouter</button>
</form>
</body>
</html>
<?php
include ('footer.html');
?>