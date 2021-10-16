<?php require('view/admin/headerView.php'); ?>

<form method="POST" action="index.php?action=connectValid">
    <div id="connexion">
        <label for="pseudo">Pseudo</label>
        <br>
        <input type="text" name="pseudo" placeholder="Votre Pseudo" >
        <br>
        <label for="password">Mot de passe</label>
        <br>
        <input type="text" name="password" placeholder="Votre mot de passe" >
        <br>
        <input type="submit" name="submit" placeholder="Connexion">
        <br>
    </div>
</form>