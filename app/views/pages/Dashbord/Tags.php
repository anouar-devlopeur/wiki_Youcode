<?php
require APPROOT . '/views/inc/header.php'; 
require APPROOT . '/views/inc/sidebar.php'; 

 ?>
<main class="mt-5 pt-3">
    <div class="main mt-2">


        <!--=========================Modal insert====================-->

        <div class="button-add-student float-end me-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@mdo">Add Tags</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Tags</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= URLROOT ?>/AdminController/InsertTags"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="Tags" class="col-form-label">Tags:</label>
                                    <input type="text" class="form-control" name="tags" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="AddTags" class="btn btn-primary">Add Tags</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ================ Order Details List ================= -->
        <div class="lyrics">
            <div class="recentOrders">
                <div class="cardHeader ms-2">
                    <h2>Tags</h2>
                    <!-- <a href="#" class="btn">View All</a> -->
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <span><i class="bi bi-table me-2"></i></span> Data Tags
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped data-table" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name_Tags</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data['Tags'] as $tags){ ?>
                                            <tr>
                                                <td>
                                                    <?= $tags->getTagID() ?>
                                                </td>
                                                <td>
                                                    <?= $tags->getTagName() ?>
                                                </td>

                                                <td>
                                                    <a class="update-btn" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#updateGenreModal" data-bs-whatever="@mdo">
                                                        <i class="btn btn-primary far fa-pen"></i>
                                                    </a>

                                                    <a
                                                        href="<?= URLROOT ?>/AdminController/DelletTags?id=<?= $tags->getTagID() ?>"><i
                                                            class="btn btn-danger far fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= New modal  ================ -->
            <div class="button-add-student float-end me-4">


                <div class="modal fade" id="updateGenreModal" tabindex="-1" aria-labelledby="updateGenreModalModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateGenreModalModalLabel">Upadte Tags</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="<?= URLROOT ?>/DashbordControler/UpdateTags"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="genre" class="col-form-label">Tags:</label>
                                        <input id="id" type="hidden" class="form-control" name="id">
                                        <input id="Tags" type="text" class="form-control" name="Tags">
                                    </div>



                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="updategenre" class="btn btn-primary">Update
                                            Tags</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</main>
<?php

require APPROOT . '/views/inc/footer.php'; 
?>