<?php require('view/admin/headerView.php'); ?>
<?php 

if (isset($_SESSION['idUsers']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}
?>
<!DOCTYPE html>
<html>

<body>
    <div class="hero">
        <aside>
            <article>
                <h4>Menu</h4>
                <a href="">Vos articles</a>
                <a href="">Me Contactez</a>
                <a href="">Me déconnectez</a>
            </article>
        </aside>
    </div>
    <div class="argument-hero">
        <form action="">
        <label for="title">Titre :</label>
        <br>
        <input type="text" name="title" value="">
        <br>
        <label for="wording">Châpo :</label>
        <br>
        <textarea id="story" name="story" 
        rows="5" cols="33">Il était une fois...</textarea>
        <br>
        <input type="submit" name="Printer">
        <br>
        </form>
    </div>
</body>

</html>