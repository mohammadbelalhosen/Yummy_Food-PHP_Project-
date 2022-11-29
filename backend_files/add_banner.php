<?php
include './backend_slicePart_inc/header.php';
?>
<!-- toast massage -->
<?php
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
?>



<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Add Banner</span>
    </div>
    <div class="card-body">
        <form action="../controller/banner_add.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <!-- //*if click the image then choose img file  -->
                    <label for="img_banner">
                        <img class="img" src="./img/placehold.png" style="width: 100%;">
                        <input type="file" class="d-none imageInput" name="banner_img" id="img_banner">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['banner_img_error'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['banner_img_error'] ?>
                        </span>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-9">
                    <button type="submit" class="btn btn-primary float-right" name="submit">Add Banner</button>
                    <label class="w-100" for="">Enter Banner Title<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="banner_title">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['banner_title_error'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['banner_title_error'] ?>
                        </span>
                    <?php
                    }
                    ?>
                    <label for="" class="w-100">Enter Banner Description<span class="text-danger">*</span>
                        <textarea name="banner_des" class="form-control"></textarea>
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['banner_des_error'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['banner_des_error'] ?>
                        </span>
                    <?php
                    }
                    ?>
                    <label for="" class="w-100">Enter Video Link<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="video_link">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['video_link_error'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['video_link_error'] ?>
                        </span>
                    <?php
                    }
                    ?>


                </div>

            </div>

        </form>
    </div>
</div>




<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['errors']);

?>


<script>
    let image_input = document.querySelector('.imageInput')
    let imgSelect = document.querySelector('.img')
    image_input.addEventListener('change', function(event) {
        let url = window.URL.createObjectURL(event.target.files[0])
        // console.log(url)
        imgSelect.src = url
    })
</script>