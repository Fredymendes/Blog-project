<?php require('view/admin/headerView.php'); ?>


<form method="POST" action="index.php?action=registerValid">
    <div id="inscription">
        <label for="lastname">Nom :</label>
        <br>
        <input type="text" name="lastname" placeholder="Votre nom" required>
        <br>
        <label for="firstname">Prénom :</label>
        <br>
        <input type="text" name="firstname" placeholder="Votre prénom" required>
        <br>
        <label for="pseudo">Pseudo :</label>
        <br>
        <input type="text" name="pseudo" placeholder="Votre pseudo" required>
        <br>
        <label for="email">Email :</label>
        <br>
        <input type="text" name="email" placeholder="Votre email" required>
        <br>
        <label for="password">Mot de passe :</label>
        <br>
        <input type="password" name="password" placeholder="Votre mot de passe" required>
        <br>
        <input type="submit" name="submit" value="S'inscrire">
    </div>
    <div>
        <p>Avez vous déja un compte ? <a href="index.php?action=connect">Connectez-vous içi!</a></p>
    </div>
</form>




