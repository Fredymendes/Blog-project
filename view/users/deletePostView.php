
<?php require('view/blog/headView.php'); ?>

<!DOCTYPE html>
<!--Navigator-->
<nav class="admin-bar">
    <ul>
        <li><a href="index.php?action=article">Revenir sur l'espace article</a></li>
    </ul>
</nav>
<div class="container">
        <form method="POST" action="index.php?action=deleteValid&id=<?= $delete->getIdPosts() ?>">
        <h3>êtes-vous sur de vouloir supprimer le post ?</h3>
        <button class="btn btn-primary text-uppercase" id="submitButton" 
        name="submit" type="submit">Supprimmer</button>
        <br>
        </form>
</div>