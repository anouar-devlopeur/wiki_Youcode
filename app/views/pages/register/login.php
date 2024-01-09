<?php
require APPROOT . '/views/inc/HeaderHome.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!"><b>WIKI</b><sup><b>new</b></sup>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link " href="<?= URLROOT?>/Pages">Home</a></li>
                <li class=" nav-item"><a class="nav-link " href="<?= URLROOT?>/UserController/register">SignUp</a>
                </li>
                <li class="nav-item"><a class="nav-link active" href="<?= URLROOT?>/UserController/login">Login</a></li>
                <!-- <li class="nav-item"><a class="nav-link " aria-current="page" href="#">Blog</a></li> -->
            </ul>
        </div>
    </div>
</nav>
<!-- login  -->
<section class="vh-70">
    <div class="container py-2 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card border border-dark" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 ">
                            <img src="<?= URLROOT ?>/img/img.png" alt="login form" class="img-fluid" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="POST" action="<?= URLROOT ?>/UserController/Login_Author">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0"><b>Login</b></span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account
                                    </h5>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Email address</label>
                                        <input type="text" id="form2Example17" class="form-control form-control-lg"
                                            name="email" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Password</label>
                                        <input type="password" id="form2Example27" class="form-control form-control-lg"
                                            name="password" />

                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" name="login"
                                            type="submit">Login</button>
                                    </div>


                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                            href="<?= URLROOT?>/UserController/register" style="color: #393f81;">
                                            Register here</a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <div class=" bg-danger w-100">

    <div class="w-75 mx-auto">


        <form class="text-center border  border-dark my-4 p-5  mx-auto card" action="#!">

            <h2 class="  mb-4">Sign in</h2>


            <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">


            <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">



            <button class="btn btn-dark btn-block my-4 text-white" type="submit">Sign in</button>


            <p>Not a member?
                <a href="<?= URLROOT?>/UserController/register">Register</a>
            </p>
        </form>
    </div>
</div> -->
<!-- Default form login -->
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">WIKI &copy; 2024</p>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>

</html>