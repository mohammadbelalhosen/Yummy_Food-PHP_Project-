<?php
include './backend_slicePart_inc/header.php';
?>
<!-- toast massage -->
<?php
if (isset($_SESSION['success'])) {
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="z-index:1;position:absolute;top:10px;right:10px">
        <div class="toast-header">
            <strong class="me-auto">Add Table Image</strong>
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
        <span>Add Table Image</span>
    </div>
    <div class="card-body">
        <form action="../controller/add_tableimg_section.php" method="POST" enctype="multipart/form-data">
            <div class="col-5">
                <!-- //*if click the image then choose img file  -->
                <span class="text-primery h5 mt-2">Select A Picture</span>
                <label for="img_banner">
                    <img class="img" src="./img/placehold.png" style="width: 100%;">
                    <input type="file" class="d-none imageInput" name="table_image" id="img_banner">
                </label>
                <?php
                if (isset($_SESSION['errors']['table_image_er'])) {
                ?>
                    <span class="text-danger">
                        <?= $_SESSION['errors']['table_image_er'] ?>
                    </span>
                <?php
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary float-left w-100" name="submit">Add Table Image</button>



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