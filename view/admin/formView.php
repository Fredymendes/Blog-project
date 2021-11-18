<?php require('view/blog/headView.php'); ?>
<?php require('view/blog/navigatorView.php'); ?>

<header class="masthead" style="background-image: url('public/assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Contact Me</h1>
                    <span class="subheading">Have questions? I have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Conversons un peu !</p>
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
                    <br />
                    <div class="form-floating">
                        <label for="typeDemande">Type de demande :</label>
                        <select id="select" name="typeDemande">
                            <option value="">--Please choose an option--</option>
                            <option value="job">Job</option>
                            <option value="question">Question</option>
                            <option value="autres">Autres</option>
                        </select>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="message" name="message"
                            placeholder="Enter your message here..." style="height: 12rem"
                            data-sb-validations="required"></textarea>
                        <label for="message">Message :</label>
                    </div>
                    <br>
                    <button class="btn btn-primary text-uppercase" id="submitButton" name="submit"
                        type="submit">Printer</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</main>