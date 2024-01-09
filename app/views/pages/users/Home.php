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
                <li class="nav-item"><a class="nav-link active" href="<?= URLROOT?>/Pages">Home</a></li>
                <li class=" nav-item"><a class="nav-link" href="<?= URLROOT?>/UserController/register">SignUp</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= URLROOT?>/UserController/login">Login</a></li>
                <!-- <li class="nav-item"><a class="nav-link " aria-current="page" href="#">Blog</a></li> -->
            </ul>
        </div>
    </div>
</nav>

<!-- Page content-->
<div class="container mt-2 ">

    <div class="col-lg-4  w-100">
        <div class="row  w-75    mx-auto">
            <!-- Search widget-->
            <div class="card mb-4 ">
                <div class="ms-2 mt-2">
                    <h2> Search</h2>
                </div>
                <div class=" card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search ..."
                            aria-label="Enter search ..." aria-describedby="button-search" />
                    </div>
                </div>
            </div>

            <div class="card mb-4 ">
                <div class="ms-2 mt-2">
                    <h2>Categories</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Nested row for non-featured blog posts-->
    <!-- <div class="row w-100"> -->

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
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>

        </div>
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
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>

        </div>
        <div class="col-md-3  ">
            <div class="card mb-4 w-100 ">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
                        alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2023</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis aliquid atque, nulla.</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>

        </div>
        <div class="col-md-3 ">
            <div class="card mb-4  w-* ">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
                        alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2023</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis aliquid atque, nulla.</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>

        </div>
        <div class="col-md-3  ">
            <div class="card mb-4  w-*">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
                        alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2023</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis aliquid atque, nulla.</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>

        </div>
        <div class="col-md-3  ">
            <div class="card mb-4  w-*">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
                        alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2023</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis aliquid atque, nulla.</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
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