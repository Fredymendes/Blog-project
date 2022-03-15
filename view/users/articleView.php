<?php require 'view/blog/headView.php'; ?>

<!DOCTYPE html>
<html>
<!--Navigator-->
<nav class="admin-bar">
    <ul>
        <li><a href="index.php?action=profil">Retour dans votre espace</a></li>
    </ul>
</nav>

<?php if (isset($_SESSION['message'])) :?>
<div class='alert alert-success'>
    <?php echo $_SESSION['message'];
    unset($_SESSION['message']);?>
</div>
<?php elseif (isset($_SESSION['warning_message'])) :?>
    <div class='alert alert-danger'>
        <?php echo $_SESSION['warning_message'];
        unset($_SESSION['warning_message']);?>
    </div>
<?php endif; ?>

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
                    <td><?php echo htmlspecialchars($post->getTitle()) ?></td>
                    <td><?php echo htmlspecialchars($post->getWording()) ?></td>
                    <td><?php echo substr(nl2br(htmlspecialchars($post->getContent())), 0, 50) . '...' ?></td>
                    <td><a class="btn btn-primary" 
                    href="index.php?action=updateId&id=<?php echo $post->getIdPosts() ?>">Modifier</a>
                    </td>
                    <td><a class="btn btn-danger" 
                    href="index.php?action=deleteId&id=<?php echo $post->getIdPosts() ?>">Supprimer</a>
                    </td>
                    </th>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>