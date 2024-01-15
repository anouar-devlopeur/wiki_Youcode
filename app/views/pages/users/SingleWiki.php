<?php
require APPROOT . '/views/inc/HeaderHome.php';
require APPROOT . '/views/inc/navbar.php';
?>
<div class="container p-5">

    <h2>POST SINGLE WIKIS</h2>
    <div class="row mx-auto   ">
        <div class="col-12 col-md-4 mt-5">
            <?php foreach ($data['affichersingle'] as $postSufCat) { ?>
            <div class="card ms-1 shadow border mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Les WIKIS CONTENT</h6>
                </div>
                <div class="card-body">
                    <img class=" img-fluid" style="max-width: 100px;"
                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($postSufCat->getWiki()->getAuthor()->getIMAGE());?>">
                    <h3 class=" text-primary">Author :
                        <em class="text-dark"> <?php echo $postSufCat->getWiki()->getAuthor()->getNom()?></em>
                    </h3>

                    <hr class=" w-25">
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
        <div class="col-12 col-md-8 ">
            <article class="card post vt-post my-5 shadow ">

                <div class="d-flex flex-column flex-md-row mx-2 mx-md-5 p-2 align-items-md-center  mb-2">
                    <div class="col-md-5 col-lg-4">
                        <div class="post-type post-img me-4">
                            <img src="<?= URLROOT ?>/public/img/<?php echo $postSufCat->getWiki()->getImage(); ?>"
                                class="  img-thumbnail" alt="image post">
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-7 col-lg-8 ms-2">
                        <div class="w-100">
                            <h3 class="md-heading fs-2 text-primary">
                                <?= $postSufCat->getWiki()->getTitle() ?>
                            </h3>

                            <p>
                                <b> <em class="fs-4 text-danger">
                                        ""
                                    </em></b>
                                <?= $postSufCat->getWiki()->getContent() ?>
                                <b> <em class="text-danger fs-4">
                                        ""
                                    </em>
                                </b>
                            </p>


                        </div>
                    </div>
                </div>
                <?php } ?>
            </article>
        </div>
    </div>

</div>


<?php
require APPROOT . '/views/inc/footerHome.php'; ?>