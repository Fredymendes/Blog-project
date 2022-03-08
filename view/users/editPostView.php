
<?php require 'view/blog/headView.php'; ?>

<!--Navigator-->
<nav class="admin-bar">
  <ul>
    <li><a href="index.php?action=article">Retour dans votre espace article</a></li>
  </ul>
</nav>
<div class="container">
  <form class="content-hero" method="POST" action="index.php?action=updateValid&id=<?php echo $update->getIdPosts() ?>">
    <label for="title">Titre :</label>
    <input class="content-post" type="text" name="title" 
    value="<?php echo htmlspecialchars($update->getTitle()) ?>">
    <label for="wording">Châpo :</label>
    <input class="content-post" type="text" name="wording" 
    value="<?php echo htmlspecialchars($update->getWording()) ?>">
    <label for="content">Contenu :</label>
    <textarea id="post" class="content" name="content" style="resize: none;" placeholder="Il était une fois...">
    <?php echo htmlspecialchars($update->getContent()) ?></textarea>
    <button class="btn btn-primary text-uppercase" id="submitButton" 
    name="submit" type="submit">Mise à jour du post</button>
  </form>
</div>