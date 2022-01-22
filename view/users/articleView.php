<!DOCTYPE html>
<html>
<!--Navigator-->
<nav class="navbar navbar-dark bg-primary">
    <ul>
        <li><a href="index.php?action=profil">Retour dans votre espace</a></li>
    </ul>
</nav>
<body>
    <div class="container">
        <h1>Liste des articles</h1>
        <?php foreach ($posts as $post) { ?>
            <article>
                <h2><?= htmlspecialchars($post->getTitle()) ?></h2>
                <h3><?= htmlspecialchars($post->getWording()) ?></h3>
                <p><?= substr(nl2br(htmlspecialchars($post->getContent())), 0, 200) . '...' ?></p>
            </article>
            <button><a href="index.php?action=updateId&id=<?= $post['idPosts'] ?>">Modifier</a></button>
            <button><a href="index.php?action=deleteId&id=<?= $post['idPosts'] ?>">Supprimer</a></button>
        <?php } ?>
    </div>   
</body>
</html>