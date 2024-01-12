<?php
require APPROOT . '/views/inc/HeaderHome.php'; 
require APPROOT . '/views/inc/navbar.php';
?>


<article class="post vt-post  py-5">
    <?php foreach($data['affichewiki'] as $postSufCat){ ?>
    <div class="d-flex flex-column flex-md-row mx-5 p-2 align-items-md-center border border-dark mb-2">
        <div class="col-md-5 col-lg-4">
            <div class="post-type post-img">
                <img src="<?= URLROOT ?>/public/img/<?php echo $postSufCat->getWiki()->getImage();?>" class="img-fluid"
                    width="500" alt="image post">
            </div>
        </div>
        <div class="col-sm-3 col-md-5  col-lg-8">
            <div class="w-75 ms-2">
                <h3 class="md-heading fs-2 text-danger"><?= $postSufCat->getWiki()->getTitle() ?></h3>
                <p><?= $postSufCat->getWiki()->getContent() ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
</article>




<?php
require APPROOT . '/views/inc/footerHome.php'; ?>