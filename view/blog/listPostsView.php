<header class="masthead" style="background-image: url('public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Blog Post</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<?php ob_start(); ?>
<?php
foreach ($listPosts as $listPost) {
    ?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <div class="post-preview">
                <a href="index.php?action=post&amp;id=<?= $listPost->getIdPosts() ?>">
                <h2 class="post-title"><?= htmlspecialchars($listPost->getTitle()) ?>
                <em> le <?= htmlspecialchars($listPost->getCreationDate()) ?></em></h2>
                <h3 class="post-subtitle"><?= nl2br(htmlspecialchars($listPost->getWording()))?></h3>
                </a>
                <h2><?= htmlspecialchars($listPost->getIdUsers()) ?></em></h2>
                <p class="post-meta"><?= substr(nl2br(htmlspecialchars($listPost->getContent())), 0, 300) . '...'?></p>
                <p><?= htmlspecialchars($listPost->getIdUsers()) ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Divider-->
<hr class="my-4" />    
    <?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>