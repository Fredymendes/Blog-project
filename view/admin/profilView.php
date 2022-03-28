
<?php require 'view/blog/headView.php'; ?>

<html>
<!--Navigator-->
<nav class="admin-bar">
    <ul>
        <li><a href="index.php">Retour à la page d'accueil</a></li>
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
<?php endif ?>

<body>
    <main class="mb-4">
     <div class="container-fluid">
        <h1 id="hero-admin" >Bonjour <?php echo $_SESSION['pseudo'] ?></h1>
        <div class="menu-content">
            <h4 class="menu">Menu</h4>
            <a href="index.php?action=article">Mes articles</a>
            <a href="index.php?action=comment">Validation des commentaires</a>
            <a href="index.php?action=deconnexion">Déconnexion</a>
        </div>
        <div id="post-content">
            <h4 class="menu">Publication du post</h4>
            <form class="content-hero" method="POST" action="index.php?action=contentValid">
                <label for="title">Titre :</label>
                <input class="content-post" type="text" name="title" value="">
                <label for="wording">Châpo :</label>
                <input class="content-post" type="text" name="wording" value="">
                <label for="content">Contenu :</label>
                <textarea id="post" name="content" style="resize: none;" 
                placeholder="Il était une fois..."></textarea>    
                <button class="btn btn-primary text-uppercase" 
                id="submitButton" name="submit" type="submit">Printer</button>
            </form>
        </div>   
    </main>
    
</body>

</html>