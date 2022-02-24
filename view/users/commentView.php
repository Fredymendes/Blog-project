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
        <h4 class="menu">Liste des commentaires</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pseudo</th>
                    <th>Commentaire</th>
                    <th>Date du commentaire</th>
                    <th>Validation</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <?php foreach ($comments as $comment) { ?>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td><?= nl2br(htmlspecialchars($comment->getPseudo())) ?></td>
                    <td><?= substr(nl2br(htmlspecialchars($comment->getComment())), 0, 150) . '...' ?></td>
                    <td><?= htmlspecialchars($comment->getCommentDate()) ?></td>
                    <td><button type="button" class="btn btn-primary">
                        <a href="index.php?action=updateComment&id=<?= $comment->getIdComments() ?>">
                        Validation</a></button></td>
                    <td><button type="button" class="btn btn-danger">
                        <a href="index.php?action=deleteComment&id=<?= $comment->getIdComments() ?>">
                        Supprimer</a></button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>