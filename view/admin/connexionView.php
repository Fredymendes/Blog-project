<?php require('view/blog/headView.php')?>
<?php require('view/blog/navigatorView.php'); ?>

<header class="masthead" style="background-image: url('public/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Devenez un Printer</h1>
                    <span class="subheading">Publiez vos articles !</span>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Mais connectez-vous ! bon sens !</p>
                <div class="my-5">
                    <form id="contactForm" method="POST" action="index.php?action=connectValid">
                        <div class="form-floating">
                            <input class="form-control" type="text" name="pseudo" placeholder="Votre Pseudo">
                            <label for="pseudo">Pseudo</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" type="text" name="password" placeholder="Votre mot de passe">
                            <label for="password">Mot de passe</label>
                        </div>
                        <br />
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" id="submitButton"
                        name="submit" type="submit">Connexion</button>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>