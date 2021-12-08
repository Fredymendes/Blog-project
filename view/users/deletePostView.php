<!--Navigator-->
<nav>
    <ul>
        <li><a href="index.php?action=article">Revenir sur l'espace article</a></li>
    </ul>
</nav>
<div class="argument-hero">
        <form method="POST" action="index.php?action=deleteValid&id=<?= $id ?>">
        <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']?>">
        <button class="btn btn-primary text-uppercase" id="submitButton"
        name="submit" type="submit">Voulez-vous supprimez cette article ?</button>
        <br>
        </form>
</div>