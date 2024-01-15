<?php
require APPROOT . '/views/inc/HeaderHome.php';
require APPROOT . '/views/inc/navbar.php';
?>
<div class=" container-fluid w-75">

    <form method="POST" action="<?= URLROOT ?>/AuthorController/updatDonnes" enctype="multipart/form-data">
        <div class="row">
            <?php

            foreach ($data['Tags_wiki'] as $tagsWiki) {

                ?>


            <div class=" col-md-6 mb-3">
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



            <input type="hidden" class="form-control" name="img" value="<?= $tagsWiki->getWiki()->getImage(); ?>"
                required>

            <!-- <img src="<?= URLROOT ?>/public/img/<?= $tagsWiki->getWiki()->getImage(); ?>" alt="Current Image"
                width="100"> -->
            <label for="newImage" class="form-label">Choose a new image:</label>
            <input type="file" class="form-control" name="newImage">

            <!-- Note: Use a different name for the new image input to avoid conflicts with the text input -->
        </div>

        <div class=" mb-3">
            <label for="category" class="form-label">Category:</label>
            <select name="category" class="form-select">
                <?php foreach ($data['Categorie'] as $category): ?>
                <option
                    <?= ($category->getCategoryID() == $tagsWiki->getWiki()->getCategorie()->getCategoryID()) ? 'selected' : '' ?>
                    value="<?= $category->getCategoryID() ?>">
                    <?= $category->getCategoryName() ?>
                </option>
                <?php endforeach; ?>
            </select>

        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags:</label>
            <div class="form-check">



                <?php
                    $var = $tagsWiki->getTags()->getTagName();
                    $selectedTagsArray = explode(',', $var);

                    foreach ($data['Tags'] as $tags) {
                        $tagID = $tags->getTagID();
                        $tagName = $tags->getTagName();

                        $isChecked = in_array($tagName, $selectedTagsArray);
                        if ($isChecked) {
                            ?>
                <input checked type="checkbox" name="tags[]" value="<?= $tags->getTagID() ?>">
                <?php
                        } else {
                            ?>
                <input type="checkbox" name="tags[]" value="<?= $tags->getTagID() ?>">
                <?php
                        }
                        echo $tags->getTagName();
                    } ?>

            </div>
        </div>
        <?php } ?>
        <div class="modal-footer">
            <button type="submit" name="uppdatepost" class="btn btn-primary">Updat Post</button>
        </div>

    </form>


</div>





<?php
require APPROOT . '/views/inc/footerHome.php'; ?>