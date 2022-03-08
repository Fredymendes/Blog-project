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
                <a href="index.php?action=post&amp;id=<?php echo $listPost->getIdPosts() ?>">
                <h3 class="post-title"><?php echo htmlspecialchars($listPost->getTitle()) ?>
                <em> le <?php echo htmlspecialchars($listPost->getCreationDate()) ?></em></h3>
                <h3 class="post-subtitle"><?php echo nl2br(htmlspecialchars($listPost->getWording()))?> 
                par <?php echo htmlspecialchars($listPost->getPseudo()) ?></h3>
                </a>
                <p class="post-meta"><?php echo substr(nl2br(htmlspecialchars($listPost->getContent())), 0, 300) . '...'?></p>
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

<?php require 'template.php'; ?>