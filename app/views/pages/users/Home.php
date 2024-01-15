<?php
require APPROOT . '/views/inc/HeaderHome.php';
require APPROOT . '/views/inc/navbar.php';
?>
<style>
.hero {
    background-image: url(public/img/wiki.jpg);
    height: auto;
    background-repeat: no-repeat;
    background-size: cover;

}

.no-underline {
    text-decoration: none !important;
}
</style>


<!-- Page content-->
<div class="">

    <div class="col-lg-4 col-md-3  hero  w-100 " style="">
        <div class=" row w-75 p-2 mx-auto">
            <!-- Search widget-->
            <div class=" mb-4 ">
                <div class="ms-2 mt-2">
                    <h2 class="text-white"> Search</h2>
                </div>
                <!-- HTML Form -->
                <form action="<?= URLROOT ?>/Pages/search" method="GET">
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" name="search" id="searchResults"
                                placeholder="Enter search..." aria-label="Enter search..."
                                aria-describedby="button-search" />
                        </div>
                    </div>

                </form>
                <div class="wrapper-box
                         bg-white mx-3" style="
                            margin-top: -2%;
                            padding-bottom: 10%;
                            width: 80%;
                            border-radius: 2%;
                            padding: 0 !important; 
  
                        "></div>
                <div class="wrapper-noresult text-white" style="display : none">
                    <!-- no found -->
                </div>
                <!-- <div class="tags-box
                         bg-white mx-3" style="
                            margin-top: -2%;
                            padding-bottom: 10%;
                            width: 80%;
                            border-radius: 2%;
                        "></div>
                <div class="cat-box
                         bg-white mx-3" style="
                            margin-top: -2%;
                            padding-bottom: 10%;
                            width: 80%;
                            border-radius: 2%;
                        "></div> -->

            </div>

            <div class="card mb-4 " style="opacity: 0.8;">
                <div class="ms-2 mt-2">
                    <h2>Categories</h2>
                </div>
                <div class="card-body">
                    <div class="d-grid">

                        <div class="col-sm-6">
                            <ul class=" list-unstyled mb-0 d-felx ">
                                <?php foreach ($data['Categorie'] as $categorie) { ?>
                                <li class=""> <a class=" no-underline btn btn-info mt-2"
                                        href=" <?= URLROOT ?>/Pages/RechercheCat?cat=<?= $categorie->getCategoryID() ?>">
                                        <h3>
                                            <?= $categorie->getCategoryName() ?>
                                        </h3>
                                    </a>
                                </li>

                                <?php } ?>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- <div class=" row w-100"> -->

    <div class=" card shadow container row mx-auto mt-4 " style="margin-bottom: 15%;">
        <div class="card-head border bg-dark mt-2 pt-2">
            <h2 class="fs-1 font-weight-bold mb-5 text-center mt-2  text-white">POST WIKI </h2>
        </div>
        <div class="card-body row">
            <?php



            foreach ($data['post'] as $post) {
                ?>
            <div class="col-md-3  ">
                <div class="card mb-4 w-100 ">
                    <a href="#!"> <img src="<?= URLROOT ?>/public/img/<?php echo $post->getWiki()->getImage(); ?>"
                            width="600" height="200" class="card-img-top card-img-custom p-1 " />
                    </a>

                    <div class=" card-body bg-dark white-text rounded-bottom">
                        <div class="small text-white">
                            <?= $post->getWiki()->getDateCreated() ?>
                        </div>
                        <h2 class=" card-title text-white h4">
                            <?= $post->getWiki()->getTitle() ?>
                        </h2>
                        <hr class="hr-light w-50 text-white ">
                        <span class="card-title text-white  h6">
                            <?php
                                $tagsString = $post->getTags()->getTagName();

                                if (!empty($tagsString)) {
                                    $tagsArray = explode(',', $tagsString);

                                    foreach ($tagsArray as $tag) {
                                        ?>

                            <?php echo '#'. $tag. ''; ?>

                            <?php
                                    }
                                }
                                ?>


                        </span>
                        <p class="card-text text-white">
                            <?= $post->getWiki()->getCategorie()->getCategoryName() ?>
                        </p>
                        <a class="btn btn-primary text-white"
                            href="<?= URLROOT ?>/SingleController/Single?id=<?= $post->getWiki()->getWikiID() ?>">Read
                            more
                            →</a>
                    </div>
                </div>

            </div>
            <?php } ?>
            <!-- Blog post-->


        </div>





    </div>

    <!-- </div> -->





</div>





<?php
require APPROOT . '/views/inc/footerHome.php';
?>