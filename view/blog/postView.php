<header class="masthead" style="background-image: url('public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?= htmlspecialchars($post['title']) ?></h1>
                    <span class="subheading"><?= htmlspecialchars($post['wording']) ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<?php ob_start(); ?>

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h3></h3>
                <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
            </div>
        </div>
    </div>
</article>
<hr class="my-4" /> 

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <hr class="my-4" /> 
<?php
}
?>
<div class="news">
<form method="POST" action="index.php?action=commentValid&amp;id=<?= $post['idPosts'] ?>">
    <label for="comment">Message :</label><br>
    <textarea id="message" name="comment" cols="50" rows="7"></textarea><br>
    <input type="submit" class="btn btn-primary text-uppercase" name="submit" value="Envoyer le message">
</form> 
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>