<?php
include './backend_slicePart_inc/header.php';
include'../include/env.php';
$id = $_GET['id'];
$query = "SELECT * FROM add_banner_part WHERE id=$id";
$exe = mysqli_query($conn,$query);
$results = mysqli_fetch_assoc($exe);
$banner_img_path = './uploads/' . $results['img_banner'];

// print_r($results['img_banner']);
?>
<!-- toast massage -->

<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Edit Banner</span>
    </div>
    <div class="card-body">
        <form action="../controller/banner_edit.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <!-- //*if click the image then choose img file  -->
                    <label for="img_banner">
                        <img class="img" src="<?=$banner_img_path?>" style="width: 100%;">
                        <input type="file" class="d-none imageInput" value="<?=$banner_img_path?>" name="banner_img" id="img_banner">
                    </label>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="hidden" name="banner_name" value="<?=$results['img_banner']?>">
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
                    <button type="submit" class="btn btn-primary float-right" name="submit">Update Banner</button>
                    <label class="w-100" for="">Edit Banner Title<span class="text-danger">*</span>
                        <input type="text" class="form-control" value="<?=$results['banner_title']?>" name="banner_title">
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
                    <label for="" class="w-100">Edit Banner Description<span class="text-danger">*</span>
                        <textarea name="banner_des" class="form-control"><?=$results['banner_des']?></textarea>
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
                    <label for="" class="w-100">Edit Video Link<span class="text-danger">*</span>
                        <input type="text" class="form-control" value="<?=$results['video_link']?>" name="video_link">
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