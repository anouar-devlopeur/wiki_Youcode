<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!"><b>WIKI</b><sup><b>new</b></sup>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="<?= URLROOT ?>/Pages">Home</a></li>
                <?php if (!isset($_SESSION["userName"]) && empty($_SESSION["userName"])) { ?>
                <li class=" nav-item"><a class="nav-link" href="<?= URLROOT ?>/UserController/register">SignUp</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/UserController/login">Login</a></li>
                <?php }elseif( $_SESSION['userRole']==1){?>
                <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/AdminController/logout">Logut</a>
                </li>
                <li class="nav-item"><a class="nav-link " aria-current="page"
                        href="<?= URLROOT ?>/SingleController">Post</a></li>

                <?php  }
                else { ?>
                <li class="nav-item"><a class="nav-link " aria-current="page"
                        href="<?= URLROOT ?>/AdminController/">Dashbord</a></li>

                <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/AdminController/logout">Logut</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>