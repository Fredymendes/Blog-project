
<?php require('view/blog/headView.php'); ?>

<html>
<!--Navigator-->
<nav class="admin-bar">
    <ul>
        <li><a href="index.php">Retour à la page d'acceuil</a></li>
    </ul>
</nav>

<body>
    <div class="container-fluid">
        <h1 id="hero-admin" >Bonjour <?= $_SESSION['pseudo'] ?></h1>
        <div class="menu-content">
            <h4 class="menu">Menu</h4>
            <a href="index.php?action=article">Mes articles</a>
            <a href="index.php?action=comment">Validation des commentaires</a>
            <a href="index.php?action=deconnexion">Déconnection</a>
        </div>
        <div id="post-content">
            <h4 class="menu">Publication du post</h4>
            <form method="POST" action="index.php?action=contentValid">
                <label for="title">Titre :</label>
                <input type="text" name="title" value="">
                <label for="wording">Châpo :</label>
                <input type="text" name="wording" value="">
                <label for="content">Contenu :</label>
                <div id="content">
                <textarea id="content-post" name="content" placeholder="Il était une fois..."></textarea>    
                </div>
                <button class="btn btn-primary text-uppercase" id="submitButton" name="submit"
                    type="submit">Printer</button>
            </form>
        </div>
</body>

</html>