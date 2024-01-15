<?php
require APPROOT . '/views/inc/HeaderHome.php'; 
require APPROOT . '/views/inc/navbar.php';
?>


<div class="container p-5 ">
    <!-- fs-1 font-weight-bold mb-5 text-center mt-2 text-white -->
    <h2 class="card font-weight-bold bg-dark text-center text-white py-2">POST Categorie WIKIS</h2>
    <div class="row mx-auto g-5 ">
        <div class=" mt-5 card pt-5 ">
            <div class="row">
                <?php foreach ($data['affichewiki'] as $postSufCat) { ?>
                <div class="col-md-3  ">


                    <div class="card ms-1 shadow border mb-5">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> CONTENU Author</h6>
                        </div>
                        <div class="card-body">

                            <img class="img-fluid" style="max-width: 100px;"
                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($postSufCat->getWiki()->getAuthor()->getIMAGE());?>">

                            <h5><?php echo $postSufCat->getWiki()->getAuthor()->getNom()?></h5>
                            <hr class="w-25">
                            <span> <?= $postSufCat->getWiki()->getTitle() ?></span><br>
                            <span><?php echo $postSufCat->getWiki()->getDateCreated()?></span><br>

                            <h6>
                                <span class="text-primary"><b>Categorie :</b>

                                    <em class="text-dark">
                                        <?php echo $postSufCat->getWiki()->getCategorie()-> getCategoryName()?></em>
                                </span>
                            </h6>


                        </div>
                    </div>

                </div>
                <div class="col-md-8 card mb-2  ">


                    <div class="d-flex flex-column flex-md-row mx-2 mx-md-5 p-2 align-items-md-center mb-2">
                        <div class="col-md-5 col-lg-4">
                            <div class="post-type post-img me-4">
                                <img src="<?= URLROOT ?>/public/img/<?php echo $postSufCat->getWiki()->getImage(); ?>"
                                    class="img-thumbnail" alt="image post">
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-7 col-lg-8 ms-2">
                            <div class="w-100">
                                <h3 class="md-heading fs-2 text-primary">
                                    <?= $postSufCat->getWiki()->getTitle() ?>
                                </h3>
                                <p><em class=" text-danger fs-3">""</em>
                                    <?= $postSufCat->getWiki()->getContent() ?>
                                    <em class=" text-danger fs-3">""</em>
                                </p>


                            </div>
                        </div>
                    </div>

                </div>
                <?php
                     }
                       ?>


            </div>
        </div>

    </div>

</div>




<?php
require APPROOT . '/views/inc/footerHome.php'; ?>