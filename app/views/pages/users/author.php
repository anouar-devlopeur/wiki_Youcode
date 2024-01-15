<?php
require APPROOT . '/views/inc/HeaderHome.php';
require APPROOT . '/views/inc/navbar.php';
?>
<section class=" container mt-2   ">
    <div class=" button-add-student ms-2 mb-4 mt-3 ">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@mdo">Add Post Wiki</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add WIKI</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?= URLROOT ?>/AuthorController/InsertPost"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="col-form-label">
                                    title :
                                </label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="Content" class="col-form-label">
                                    Content :
                                </label>
                                <input type="text" class="form-control" name="Content" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="col-form-label">
                                    Image :
                                </label>
                                <input type="file" class="form-control" name="img" required>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="col-form-label">
                                    Categorie :
                                </label>
                                <select name="category" class="form-select">
                                    <?php foreach ($data['Categorie'] as $categorie): ?>
                                        <option value="<?= $categorie->getCategoryID() ?>">
                                            <?= $categorie->getCategoryName() ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                </select>
                            </div>
                            <label for="tags">Tags :</label>

                            <?php foreach ($data['Tags'] as $tags) { ?>
                                <input type="checkbox" name="tags[]" value="<?= $tags->getTagID() ?>">

                                <?= $tags->getTagName() ?>

                            <?php } ?>
                            <br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addpost" class="btn btn-primary">Add Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<div class=" card  container mt-5  mx-auto ">
    <div class="card-head border bg-dark mt-2 pt-2">
        <h2 class="fs-1 font-weight-bold mb-5 text-center mt-2  text-white">POST WIKI </h2>
    </div>
    <div class="  row gap-1 ">
        <?php


        foreach ($data['post'] as $post) {

            if ($post->getWiki()->getAuthor()->getId_user() == $_SESSION['userId']) {


                ?>
                <div class="card-body  p-2 mx-2 col-md-4 card my-4   ">
                    <a href="#!"> <img src="<?= URLROOT ?>/public/img/<?php echo $post->getWiki()->getImage(); ?>" width="600"
                            height="200" class="card-img-top card-img-custom p-1 " />
                    </a>
                    <div class="card-body">
                        <div class="small text-muted">
                            <?= $post->getWiki()->getDateCreated() ?>
                        </div>
                        <h2 class="card-title h4">
                            <?= $post->getWiki()->getTitle() ?>
                        </h2>
                        <span class="card-title">
                            <?= $post->getWiki()->getCategorie()->getCategoryName() ?>
                        </span>
                        <p class="card-text">
                            <?= $post->getWiki()->getContent() ?>
                        </p>
                        <a class="btn btn-primary update-wiki" href="<?= URLROOT ?>/AuthorController/EditPost/<?=

                              $post->getWiki()->getWikiID() ?>">Edit</a>

                        <a class=" btn btn-danger"
                            href="<?= URLROOT ?>/AuthorController/DeletePost?iddelete=<?= $post->getWiki()->getWikiID() ?>">Delete</a>
                    </div>

                </div>
            <?php }
        }
        ?>

    </div>


</div>
<section class="mt-5 container card">
    <div class="row card-body container">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Data WIKI Author
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Tlitle</th>
                                    <th>Content</th>
                                    <th>Images</th>
                                    <th>Date_Create</th>
                                    <th>Categorie</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['post'] as $Wiki) {
                                    if ($Wiki->getWiki()->getAuthor()->getId_user() == $_SESSION['userId']) { ?>
                                        <tr>

                                            <td>
                                                <?= $Wiki->getWiki()->getTitle() ?>
                                            </td>
                                            <td>
                                                <?= $Wiki->getWiki()->getContent() ?>
                                            </td>
                                            <td>
                                                <img src="<?= URLROOT ?>/public/img/<?php echo $Wiki->getWiki()->getImage(); ?>"
                                                    style="width: 100px; border-radius: 10px;" />


                                            </td>
                                            <td>
                                                <?= $Wiki->getWiki()->getDateCreated() ?>
                                            </td>


                                            <td>
                                                <?= $Wiki->getWiki()->getCategorie()->getCategoryName() ?>
                                            </td>



                                        </tr>
                                    <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<?php
require APPROOT . '/views/inc/footerHome.php'; ?>