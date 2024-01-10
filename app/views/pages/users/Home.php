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

    <div class=" row">



        <!-- Blog post-->

        <?php 
        
        
        foreach($data['post'] as $post){
            ?>
        <div class="col-md-3  ">
            <div class="card mb-4 w-100 ">
                <a href="#!"><img
                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode( $post->getWiki()->getImage()); ?>"
                        class="card-img-top" /></a>
                <div class="card-body">
                    <div class="small text-muted"><?= $post->getWiki()->getDateCreated() ?> </div>
                    <h2 class="card-title h4"><?= $post->getWiki()->getTitle() ?></h2>
                    <p class="card-text"></p>
                    <a class="btn btn-primary" href="<?php $post->getID_PIVOT() ?>">Read more →</a>
                </div>
            </div>

        </div>
        <?php } ?>
        <!-- Blog post-->




        <!-- <div class=" col-md-3 card mb-4 w-* ">
            <a href=" #!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
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