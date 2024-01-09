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


<div class=" bg-danger w-100">

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
</div>
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