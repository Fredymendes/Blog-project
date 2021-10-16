<?php ob_start()?>

<?php
while ($data = $posts->fetch())
{
?>
<div id="article">
<div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
        </h3>
        
        <h3> 
            <?= nl2br(htmlspecialchars($data['wording']))?>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($data['content']))?>
        </p>
        <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['idPosts'] ?>">Lire la suite</a></em>
    </div>
</div>
    
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>