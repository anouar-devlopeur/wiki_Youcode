<?php
require APPROOT . '/views/inc/HeaderHome.php'; 
require APPROOT . '/views/inc/navbar.php';
?>
<section class=" container mt-2 ">
    <div class=" button-add-student ms-2 mb-4 mt-3">
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
                        <form method="POST" action="<?= URLROOT ?>/AdminController/InsertCategorie"
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
                                <input type="file" class="form-control" name="image" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="col-form-label">
                                    date :
                                </label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="col-form-label">
                                    Categorie :
                                </label>
                                <select name="category" class="form-select">
                                    <?php foreach ($data['Categorie'] as $categorie) : ?>
                                    <option value="<?= $categorie->getCategoryID() ?>">
                                        <?= $categorie->getCategoryName() ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>

                                </select>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addCAT" class="btn btn-primary">Add Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" mt-5  mx-auto">
        <div class=" row gap-2 ">
            <div class=" col-md-3 card my-4  ">
                <a href=" #!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg"
                        alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2023</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis aliquid atque, nulla.</p>
                    <a class="btn btn-primary" href="#!">update</a>
                    <a class="btn btn-danger" href="#!">Delete</a>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
require APPROOT . '/views/inc/footerHome.php'; ?>