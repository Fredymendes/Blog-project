<header class="masthead" style="background-image: url('public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Blog Printer</h1>
                    <span class="subheading">Fredy Mendes--Dévloppeur PHP</span>
                </div>
            </div>
        </div>
    </div>
</header>

<?php ob_start()?>

<?php
while ($data = $posts->fetch())
{
    
?>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <div class="post-preview">
                <a href="index.php?action=post&amp;id=<?= $data['idPosts'] ?>">
                <h2 class="post-title"><?= htmlspecialchars($data['title']) ?><em> le <?= $data['creation_date_fr'] ?></em></h2>
                <h3 class="post-subtitle"><?= nl2br(htmlspecialchars($data['wording']))?></h3>
                </a>
                <p class="post-meta"><?= substr(nl2br(htmlspecialchars($data['content'])), 0, 300) . '...'?></p>
            </div>
        </div>
    </div>
</div>
<!-- Divider-->
<hr class="my-4" />    
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>