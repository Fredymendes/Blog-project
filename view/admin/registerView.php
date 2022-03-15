<?php require 'view/blog/headView.php'; ?>
<?php require 'view/blog/navigatorView.php'; ?>

<header class="masthead" style="background-image: url('public/assets/img/post-sample-image.jpg')">
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

<?php if (isset($_SESSION['message'])) :?>
<div class='alert alert-success'>
    <?php echo $_SESSION['message'];
    unset($_SESSION['message']);?>
</div>
<?php elseif (isset($_SESSION['warning_message'])) :?>
    <div class='alert alert-danger'>
        <?php echo $_SESSION['warning_message'];
        unset($_SESSION['warning_message']);?>
    </div>
<?php endif ?>

<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2>Mais enregistrez-vous ! bons sens !</h2>
                <div class="my-5">
                    <form id="contactForm" method="POST" action="index.php?action=registerValid">
                        <div class="form-floating">
                            <input class="form-control" type="text" name="lastname"
                                placeholder="Votre nom" required>
                            <label for="lastname">Nom :</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" type="text" name="firstname"
                                placeholder="Votre prénom" required>
                            <label for="firstname">Prénom :</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" type="text" name="pseudo"
                            placeholder="Votre pseudo" required>
                            <label for="pseudo">Pseudo :</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" type="text" name="email"
                            placeholder="Votre email" required>
                            <label for="email">Email :</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" type="text" name="password"
                            placeholder="Votre mot de passe" required>
                            <label for="password">Mot de passe :</label>
                        </div>
                        <br />
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" id="submitButton"
                         name="submit" type="submit">Inscription</button>
                        <div>
                            <p>Avez vous déja un compte ? <a href="index.php?action=connect">Connectez-vous ici!</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>