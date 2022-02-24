
<?php require('view/blog/headView.php'); ?>

<!--Navigator-->
<nav class="admin-bar">
  <ul>
    <li><a href="index.php?action=article">Retour dans votre espace article</a></li>
  </ul>
</nav>
<div class="container">
  <form method="POST" action="index.php?action=updateValid&id=<?= $update->getIdPosts() ?>">
    <label for="title">Titre :</label>
    <input type="text" name="title" value="<?= htmlspecialchars($update->getTitle()) ?>">
    <label for="wording">Châpo :</label>
    <input type="text" name="wording" value="<?= htmlspecialchars($update->getWording()) ?>">
    <label for="content">Contenu :</label>
    <div id="content-update">
      <textarea name="content" rows="5" cols="33" placeholder="Il était une fois...">
        <?= htmlspecialchars($update->getContent()) ?>
      </textarea>
    </div>
    <button class="btn btn-primary text-uppercase" id="submitButton" 
    name="submit" type="submit">Mise à jour du post</button>
  </form>
</div>