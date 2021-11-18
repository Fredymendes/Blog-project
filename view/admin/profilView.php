<?php require('view/blog/headView.php'); ?>
<?php require('view/blog/navigatorView.php'); ?>



<!DOCTYPE html>
<html>
<header class="masthead" style="background-image: url('public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?php if (isset($_SESSION['idUsers']) AND isset($_SESSION['pseudo'])){echo 'Bonjour ' . $_SESSION['pseudo'];}?></h1>
                </div>
            </div>
        </div>
    </div>
</header>


<body>
    <div class="hero">
        <aside>
            <article>
                <h4>Menu</h4>
                <a href="index.php?action=article">Mes articles</a>
                <br />
                <a href="index.php?action=deconnexion">Me déconnectez</a>
            </article>
        </aside>
    </div>
    <div class="argument-hero">
        <form method="POST" action="index.php?action=contentValid">
        <input type="file" name="photo"> 
        <br />  
        <label for="title">Titre :</label>
        <br />
        <input type="text" name="title" value="">
        <br />
        <label for="wording">Châpo :</label>
        <br />
        <input type="text" name="wording" value="">
        <br />
        <label for="content">Contenu :</label>
        <br />
        <textarea name="content" 
        rows="5" cols="33" placeholder="Il était une fois..."></textarea>
        <br />
        <button class="btn btn-primary text-uppercase" id="submitButton"
        name="submit" type="submit">Printer</button>
        <br>
        </form>
    </div>
</body>

</html>