<?php
include './backend_slicePart_inc/header.php';
?>

<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Add Chefs Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/add_chefs_section.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <!-- //*if click the image then choose img file  -->
                    <label for="chefs_img">
                        <img class="img" src="./img/placehold.png" style="width: 100%;">
                        <input type="file" class="d-none imageInput" name="chefs_img" id="chefs_img">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['chefs_img_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['chefs_img_er'] ?>
                        </span>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-9">
                    <button type="submit" class="btn btn-primary float-right" name="submit">Add Chefs</button>
                    <label class="w-100" for="">Enter Chefs Name<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="chefs_name">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['chefs_name_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['chefs_name_er'] ?>
                        </span>
                    <?php
                    }
                    ?>
                    <label for="" class="w-100">Enter Chefs Job Title<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="job_title">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['job_title_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['job_title_er'] ?>
                        </span>
                    <?php
                    }
                    ?>
                    <label for="" class="w-100">Enter Chefs Description<span class="text-danger">*</span>
                        <textarea name="chefs_des" class="form-control"></textarea>
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['chefs_des_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['chefs_des_er'] ?>
                        </span>
                    <?php
                    }
                    ?>
                    <label for="" class="w-100">Enter Facebook Profile link<span class="text-danger">*</span>
                        <input type="text" name="profile_link" class="form-control">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['profile_link_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['profile_link_er'] ?>
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