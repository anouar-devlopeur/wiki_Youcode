<div class="offcanvas offcanvas-start sidebar-nav bg-dark mt-1" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav" style=" height: 80vh;">

                <li style=" margin-top:7%" class="btn bg-dark">
                    <a href="<?= URLROOT ?>/AdminController" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li style=" margin-top:7%" class="btn bg-dark">
                    <a href="<?= URLROOT ?>/AdminController/Categorie" class="nav-link px-3">
                        <span>Categorie</span>
                    </a>
                </li>

                <li style=" margin-top:7%" class="btn bg-dark">
                    <a href="<?= URLROOT ?>/AdminController/Tags" class="nav-link px-3">
                        <span>Tags</span>
                    </a>
                </li>

                <li style=" margin-top:7%" class="btn bg-dark">
                    <a href="<?= URLROOT ?>/AdminController/Wiki" class="btn nav-link px-3">
                        <span>Post_Author</span>
                    </a>
                </li>
                <!-- <li style=" margin-top:7%" class="btn bg-dark">
                    <a href="<?= URLROOT ?>/Pages" class="nav-link px-3">
                        <span>Home</span>
                    </a>
                </li> -->
                <form action="<?= URLROOT ?>/AdminController/logout" class=" ps-5 mt-5">

                    <button class="btn bg-dark ms-1 w-75">
                        <span class="nav-link px-3">
                            <span>Log Out</span>
                        </span>
                    </button>
                </form>
            </ul>

        </nav>
    </div>
</div>