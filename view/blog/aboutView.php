<?php require 'view/blog/headView.php'; ?>
<?php require 'view/blog/navigatorView.php'; ?>

<header class="masthead" style="background-image: url('public/assets/img/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <img class="hero" src="public/assets/img/hero.jpg" alt="Fredy Mendes">
                    <h1>Fredy Mendes</h1>
                    <span class="subheading">Le développeur qu’il vous faut !</span>
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
<?php endif; ?>

<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2>Qui je suis ?</h2>
                <span class="subheading">Mon parcours professionnel</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur
                    voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam
                    ducimus consectetur?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque
                    architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum
                    in officia voluptas voluptatibus, minus!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid
                    ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit
                    tempora!</p>
                <a href="public/assets/img/Développeur_web.pdf">=> Lien du CV</a>
            </div>
        </div>
    </div>
    <hr class="my-4" />

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2>Conversons un peu !</h2>
                <div class="my-5">
                    <form id="contactForm" method="POST" action="index.php?action=formValid">
                        <div class="form-floating">
                            <input class="form-control" type="text" name="lastname" placeholder="Votre nom">
                            <label for="lastname">Nom :</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" type="text" name="firstname" placeholder="Votre prénom">
                            <label for="firstname">Prénom :</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" type="text" name="email" placeholder="Votre email">
                            <label for="email">Email :</label>
                        </div>
                        <div class="form-floating">
                            <p for="object">Type de demande :</p>
                            <select id="select" name="object">
                                <option value="">--Quel est la raisons de votre demande ?--</option>
                                <option value="job">Job</option>
                                <option value="question">Question</option>
                                <option value="autres">Autres</option>
                            </select>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="message"
                                placeholder="Enter your message here..."                
                                data-sb-validations="required"></textarea>
                            <label for="message">Message :</label>
                        </div>
                        <br>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" id="submitButton" name="submit"
                            type="submit">Printer</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</main>

<?php require 'view/blog/footerView.php'; ?>