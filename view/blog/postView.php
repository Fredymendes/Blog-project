<header class="masthead" style="background-image: url('public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?= htmlspecialchars($post->getTitle()) ?></h1>
                    <span class="subheading"><?= htmlspecialchars($post->getWording()) ?></span>
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
                <p><?= nl2br(htmlspecialchars($post->getContent())) ?></p>
                <h3><?= htmlspecialchars($post->getPseudo()) ?></h3>
            </div>
        </div>
    </div>
</article>
<hr class="my-4" /> 
<?php
foreach ($listComments as $listComment) {
    ?>
    <p><strong><?= htmlspecialchars($listComment->getPseudo()) ?></strong>
    le <?= htmlspecialchars($listComment->getCommentDate()) ?></p>
    <p><?= nl2br(htmlspecialchars($listComment->getComment())) ?></p>
    <hr class="my-4" /> 
    <?php
}
?>

<?php if (!isset($_SESSION['role'])) :?>
<div id="warning-conn">
    <p id="warn-message">Veuillez vous connectez afin d'envoyez un message</p>
</div>
<?php else :?>
<form id="postmessage" method="POST" action="index.php?action=commentValid&amp;id=<?= $post->getIdPosts() ?>">
    <label for="comment">Message :</label>
    <textarea id="messagepost" name="comment" style="resize: none;"></textarea>
    <input type="submit" class="btn btn-primary text-uppercase" name="submit" value="Envoyer le message">   
</form> 
<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>