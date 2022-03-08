<!--footer-->
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                <?php if (!isset($_SESSION['pseudo'])) :?>
                    <li class="list-inline-item">
                        <a href="http://localhost/Blog_project/index.php?action=connect">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                <?php elseif ($_SESSION['role'] == 1) : ?>    
                    <li class="list-inline-item">
                        <a href="http://localhost/Blog_project/index.php?action=profil">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="list-inline-item" href="index.php?action=profil">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                        </span>
                        </a>
                    </li>
                <?php endif; ?>
                    <li class="list-inline-item">
                        <a href="https://twitter.com/FredyMendes1">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/in/fredy-mendes-912699173/">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/Fredymendes">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
            </div>
        </div>
    </div>
</footer>