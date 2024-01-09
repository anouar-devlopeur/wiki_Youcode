<?php
require APPROOT . '/views/inc/HeaderHome.php'; ?>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!"><b>WIKI</b><sup><b>new</b></sup>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">SignUp</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Login</a></li>
                <!-- <li class="nav-item"><a class="nav-link " aria-current="page" href="#">Blog</a></li> -->
            </ul>
        </div>
    </div>
</nav>

<!-- Page content-->
<div class="container mt-2 ">


    <div class=" row">



        <!-- Blog post-->
        <div class="col-md-3  ">
            <div class="card mb-4 w-100 ">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
                        alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2023</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis aliquid atque, nulla.</p>
                    <!-- <a class="btn btn-primary" href="#!">Read more →</a> -->
                </div>
            </div>

        </div>

        <!-- <div class="col-md-3 card mb-4  w-* ">
            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
                    alt="..." /></a>
            <div class="card-body">
                <div class="small text-muted">January 1, 2023</div>
                <h2 class="card-title h4">Post Title</h2>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Reiciendis aliquid atque, nulla.</p>
                <a class="btn btn-primary" href="#!">Read more →</a>
            </div>-->


    </div>

    <!-- </div> -->





</div>
</div>
<?php
require APPROOT . '/views/inc/footerHome.php'; ?>