<?php
require APPROOT . '/views/inc/HeaderHome.php';
require APPROOT . '/views/inc/navbar.php';
?>
<div class=" container-fluid w-75">

    <form method="POST" action="" enctype="multipart/form-data">
        <div class="row">
            <?php
var_dump($data['Tags_wiki']);
            foreach ($data['Tags_wiki'] as $tagsWiki) {

                ?>


            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="hidden" class="form-control" name="wikid" value="<?= $tagsWiki->getWiki()->getWikiID() ?>"
                    required>
                <input type="text" class="form-control" name="title" value="<?= $tagsWiki->getWiki()->getTitle() ?>"
                    required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Content" class="form-label">Content:</label>
                <input type="text" class="form-control" name="Content" value="<?= $tagsWiki->getWiki()->getContent() ?>"
                    required>
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" name="img" value="" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category:</label>
            <select name="category" class="form-select">
                <?php foreach ($data['Categorie'] as $category): ?>

                <option
                    selected="<?= $category->getCategoryID() == $tagsWiki->getWiki()->getCategorie()->getCategoryID() ?>"
                    value="<?= $category->getCategoryID() ?>">
                    <?= $category->getCategoryName() ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php var_dump($tagsWiki->getTags()->getTagName()); ?>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags:</label>
            <div class="form-check">



                <?php foreach ($data['Tags'] as $tags) { ?>

                <input type="checkbox" name="tags[]" value="<?= $tags->getTagID() ?>">

                <?= $tags->getTagName() ?>

                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="addpost" class="btn btn-primary">Updat Post</button>
        </div>

    </form>


</div>





<?php
require APPROOT . '/views/inc/footerHome.php'; ?>