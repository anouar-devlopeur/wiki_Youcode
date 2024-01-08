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
                                        <th>date_Cration</th>
                                        <th>Author</th>
                                        <th>categorie</th>
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
                                            <?= $statistique->getWiki()->getDateCreated()?>
                                        </td>
                                        <td>
                                            <?= $statistique->getWiki()->getAuthor()->getNom()?>
                                        </td>
                                        <td>
                                            <?= $statistique->getWiki()->getCategorie()->getCategoryName()?>
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
</main>
<?php

 require APPROOT . '/views/inc/footer.php'; 
 ?>