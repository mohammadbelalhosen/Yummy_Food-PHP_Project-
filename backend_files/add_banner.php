<?php
include './backend_slicePart_inc/header.php';
?>
<!-- toast massage -->
<!-- <?php
if (isset($_SESSION['success'])) {
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute;bottom:70px;right:20px">
        <div class="toast-header">
            <strong class="me-auto">Add Banner</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= $_SESSION['success'] ?>
        </div>
    </div>
<?php
}
?> -->



<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Add Banner</span>
    </div>
    <div class="card-body">
        <form action="../controller/banner_add.php" method="POST">
            <div class="row">
                <div class="col-3">
                    <!-- //*if click the image then choose img file  -->
                    <label for="img_banner">
                        <img src="./img/placehold.png" style="width: 100%;">
                        <input type="file" class="d-none" name="banner_img" id="img_banner">
                    </label>
                </div>
                <div class="col-9">
                    <button type="submit" class="btn btn-primary float-right" name="submit">Add Banner</button>
                    <label class="w-100" for="">Enter Banner Title<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="banner_title">
                    </label>
                    <label for="" class="w-100">Enter Banner Description<span class="text-danger">*</span>
                        <textarea name="banner_des" class="form-control"></textarea>
                    </label>
                    <label for="" class="w-100">Enter Video Link<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="video_link">
                    </label>


                </div>

            </div>

        </form>
    </div>
</div>




<?php
include './backend_slicePart_inc/footer.php';

?>