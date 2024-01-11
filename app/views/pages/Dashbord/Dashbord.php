<?php
require APPROOT . '/views/inc/header.php'; 
require APPROOT . '/views/inc/sidebar.php'; 

 ?>
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Dashboard</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body py-5 fs-3">Categorie</div>
                    <div class=" d-flex justify-content-end me-3">
                        <h2 class=""><?php  echo $data['Catgorie'] ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body py-5 fs-3">Tags</div>
                    <div class=" d-flex justify-content-end me-3">
                        <h2> <?=  $data['Tags'] ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-success text-white h-100">
                    <div class="card-body py-5 fs-3">Wiki</div>
                    <div class=" d-flex justify-content-end me-3">
                        <h2> <?=   $data['Wiki'] ?></h2>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3 mb-3">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body py-5">Author</div>
                    <div class=" d-flex">

                    </div>
                </div>
            </div> -->
        </div>
        <!-- <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                        Area Chart
                    </div>
                    <div class="card-body">
                        <canvas class="chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                        Area Chart
                    </div>
                    <div class="card-body">
                        <canvas class="chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Data WIKI
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NameTage</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>date_Cration</th>
                                        <th>Author</th>
                                        <th>categorie</th>
                                        <!-- <th>Action</th> -->


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data['statistique'] as $statistique){?>
                                    <tr>
                                        <td>
                                            <?= $statistique->getID_PIVOT() ?>
                                        </td>
                                        <td>
                                            <?= $statistique->getTags()->getTagName() ?>
                                        </td>
                                        <td>
                                            <?= $statistique->getWiki()->getTitle()?>
                                        </td>
                                        <td>
                                            <?= $statistique->getWiki()->getContent()?>
                                        </td>
                                        <td>
                                            <?= $statistique->getWiki()->getDateCreated()?>
                                        </td>
                                        <td>
                                            <?= $statistique->getWiki()->getAuthor()->getNom()?>
                                        </td>
                                        <td>
                                            <?= $statistique->getWiki()->getCategorie()->getCategoryName()?>
                                        </td>
                                        <!-- <td>
                                            <a class="Archive_Wiki btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-key=" <?= $statistique->getID_PIVOT() ?>"
                                                data-bs-target="#updateGenreModal" data-bs-whatever="@mdo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class=" bi bi-check" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                </svg>
                                            </a>
                                        </td> -->
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
    <div class="button-add-student float-end me-4">


        <!-- <div class="modal fade" id="updateGenreModal" tabindex="-1" aria-labelledby="updateGenreModalModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateGenreModalModalLabel">Archive Wiki</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?= URLROOT ?>/AdminController/ArchiveWiki"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="Wikitags" class="col-form-label">Content:</label>
                                <input id="idpivot" type="hidden" class="form-control" name="id">
                                <textarea id="content" type="text" class="form-control" name="Wiki" disabled></textarea>
                            </div>



                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="Archive" class="btn btn-primary">Archive
                                    Wiki</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</main>
<?php

 require APPROOT . '/views/inc/footer.php'; 
 ?>