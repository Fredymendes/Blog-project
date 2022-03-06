<?php require('view/blog/headView.php'); ?>

<!DOCTYPE html>
<html>
<!--Navigator-->
<nav class="admin-bar">
    <ul>
        <li><a href="index.php?action=profil">Retour dans votre espace</a></li>
    </ul>
</nav>

<body>
    <div class="container">
        <h4 class="menu">Liste des articles</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Chapo</th>
                    <th>Contenu</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <?php foreach ($posts as $post) { ?>
            <tbody>
                <tr>
                    <th scope="row">
                    <td><?= htmlspecialchars($post->getTitle()) ?></td>
                    <td><?= htmlspecialchars($post->getWording()) ?></td>
                    <td><?= substr(nl2br(htmlspecialchars($post->getContent())), 0, 50) . '...' ?></td>
                    <td><a class="btn btn-primary" 
                    href="index.php?action=updateId&id=<?= $post->getIdPosts() ?>">Modifier</a>
                    </td>
                    <td><a class="btn btn-danger" 
                    href="index.php?action=deleteId&id=<?= $post->getIdPosts() ?>">Supprimer</a>
                    </td>
                    </th>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>