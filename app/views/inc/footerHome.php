<?php
$currentYear = date('Y');

?>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white"><b>WIKI</b><sup><b>new</b></sup> &copy;
            <?php echo $currentYear ?>
        </p>
    </div>
    <div class=" text-center">
        <img src="<?= URLROOT ?>/public/img/icons8-facebook-96.png" alt="social media" width="50px">
        <img src="<?= URLROOT ?>/public/img/icons8-instagram-94.png" alt="social media" width="50px">
        <img src="<?= URLROOT ?>/public/img/icons8-twitter-96.png" alt="social media" width="50px">
        <img src="<?= URLROOT ?>/public/img/icons8-youtube-96.png" alt="social media" width="50px">
    </div>
    <div class="text-center d-flex justify-content-center gap-2 ">
        <a href="<?= URLROOT ?>/Pages" style=" text-decoration: none;" class="text-white">Home</a>
        <a href="<?= URLROOT ?>/AuthorController" style="text-decoration: none;" class="text-white">POST</a>
        <a href="<?= URLROOT ?>/AdminController/logout" style=" text-decoration: none;" class="text-white">Logut</a>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= URLROOT ?>/js/single.js"></script>
<!-- <script src="<?= URLROOT ?>/js/categorie.js"></script> -->
<!-- <script src="<?= URLROOT ?>/js/tags.js"></script> -->
<script src="<?= URLROOT ?>/js/script.js"></script>
<script src="<?= URLROOT ?>/js/Regex.js"></script>
<script src="<?= URLROOT ?>/js/ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>

</html>