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
                <li class="nav-item"><a class="nav-link " href="<?= URLROOT ?>/Pages">Home</a></li>
                <li class=" nav-item"><a class="nav-link active"
                        href="<?= URLROOT ?>/UserController/register">SignUp</a>
                </li>
                <li class="nav-item"><a class="nav-link " href="<?= URLROOT ?>/UserController/login">Login</a></li>
                <!-- <li class="nav-item"><a class="nav-link " aria-current="page" href="#">Blog</a></li> -->
            </ul>
        </div>
    </div>
</nav>
<!-- section register -->
<div class=" mb-2 w-75 mx-auto" style="background-color: #eee;">

    <div class="card my-3  border border-dark" style=" width:100%">


        <div class="card-body">


            <form method="POST" action="<?= URLROOT ?>/UserController/Register_Author" enctype="multipart/form-data">
                <p class="h2 text-center  py-2">Sign up</p>



                <div class="md-form my-3">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
                            class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg><label for="materialFormCardNameEx" class="font-weight-light"><b>Your name</b></label>
                    </div>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Entre Full Name..">
                    <span class="text-danger ms-3">
                        <?php
                        if (isset($data['error_Nom'])) {
                            echo $data['error_Nom'];
                        } ?>
                    </span>


                </div>

                <!-- Material input email -->
                <div class="md-form my-3 ">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
                            class="bi bi-envelope" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                        <label for="materialFormCardEmailEx" class="font-weight-light"><b>Your email</b></label>
                    </div>


                    <input type="text" name="email" id="email" class="form-control" placeholder="Entre Email ..">
                    <span class="text-danger ms-3">
                        <?php if(isset($data['error_Email']) ){
                          echo  $data['error_Email'];
                        }
                            
                            ?>
                    </span>

                </div>
                <div class="md-form my-3">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
                            class="bi bi-card-image" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                            <path
                                d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z" />
                        </svg>
                        <label for="materialFormCardPasswordEx" class="font-weight-light "><b>Your
                                Image</b></label>
                    </div>
                    <input type="file" name="author" id="materialFormCardPasswordEx" class="form-control"
                        placeholder="Entre Image ..">
                    <span class="text-danger ms-3">
                        <?php if(isset($data['error_Image'])){ 
                            echo $data['error_Image'];
                             }?>
                    </span>

                </div>



                <!-- Material input password -->
                <div class="md-form my-3">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
                            class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                        </svg>
                        <label for="materialFormCardPasswordEx" class="font-weight-light "><b>Your
                                password</b></label>
                    </div>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Entre Password..">
                    <span class="text-danger ms-3">

                        <?php if(isset($data['error_Password'])){ 
                            echo $data['error_Password'];
                            } ?>

                    </span>

                </div>

                <div class="text-center  py-4 mt-3">
                    <button class="btn btn-dark w-50" name="AddRegister" type="submit">Register</button>
                </div>
            </form>

            <?php 
                if(isset($_SESSION['succes'])) {?>
            <h3 class="alert alert-success text-center" role="alert">
                <?php  echo $_SESSION['succes'];
                unset($_SESSION['succes']);
                }
                if(isset($_SESSION['Error'])){
                  ?>
                <h3 class="alert alert-danger text-center" role="alert">
                    <?php    echo $_SESSION['Error'];
                     unset($_SESSION['Error']);
                   }
                    ?>
                </h3>



        </div>


    </div>

</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">WIKI &copy; 2024</p>
    </div>
</footer><?php
require APPROOT . '/views/inc/footerHome.php'; ?>