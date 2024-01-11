<?php
require APPROOT . '/views/inc/HeaderHome.php'; 
require APPROOT . '/views/inc/navbar.php';
?>



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
                    <div class="d-grid">

                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0 ">
                                <?php foreach($data['Categorie'] as $categorie) {?>
                                <li><a href="<?= URLROOT ?>"><?= $categorie->getCategoryName()?></a></li>

                                <?php } ?>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- <div class=" row w-100"> -->

    <div class=" row " style="margin-bottom: 15%;">



        <!-- Blog post-->

        <?php 
        
        
        foreach($data['post'] as $post){
            ?>
        <div class="col-md-3  ">
            <div class="card mb-4 w-100 ">
                <a href="#!"> <img src="<?= URLROOT ?>/public/img/<?php echo $post->getWiki()->getImage(); ?>"
                        width="600" height="200" class="card-img-top card-img-custom p-1 " />
                </a>

                <div class="card-body">
                    <div class="small text-muted"><?= $post->getWiki()->getDateCreated() ?> </div>
                    <h2 class=" card-title h4"><?= $post->getWiki()->getTitle() ?></h2>
                    <span class="card-title h6">
                        <?= $post->getTags()->getTagName() ?></span>
                    <p class="card-text"><?= $post->getWiki()->getCategorie()->getCategoryName() ?>
                    </p>
                    <a class="btn btn-primary"
                        href="<?= URLROOT ?>/SingleController/Single?id=<?= $post->getID_PIVOT() ?>">Read more →</a>
                </div>
            </div>

        </div>
        <?php } ?>
        <!-- Blog post-->







    </div>

    <!-- </div> -->





</div>
</div>
<?php
require APPROOT . '/views/inc/footerHome.php'; ?>