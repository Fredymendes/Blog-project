<!--Navigator-->
<nav>
   <ul>
    <li><a href="index.php?action=article">Retour dans votre espace article</a></li>
  </ul>
</nav>
<div class="argument-hero">
        <form method="POST" action="index.php?action=updateValid&id=<?= $id ?>">
        <br />  
        <label for="title">Titre :</label>
        <br />
        <input type="text" name="title" value="<?= $post['title']?>">
        <br />
        <label for="wording">Châpo :</label>
        <br />
        <input type="text" name="wording" value="<?= $post['wording']?>">
        <br />
        <label for="content">Contenu :</label>
        <br />
        <textarea name="content" 
        rows="5" cols="33" placeholder="Il était une fois..."><?= $post['content']?></textarea>
        <br />
        <button class="btn btn-primary text-uppercase" id="submitButton"
        name="submit" type="submit">Mise à jour du post</button>
        <br>
        </form>
</div>