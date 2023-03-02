<?php
include './backend_slicePart_inc/header.php';
?>
<!-- toast massage -->
<?php
if (isset($_SESSION['success'])) {
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute;bottom:120px;right:20px;z-index:5">
        <div class="toast-header">
            <strong class="me-auto">Add About Section</strong>
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
        <span>Add About Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/add_about.php" method="POST" enctype="multipart/form-data">
            <div >

                <button type="submit" class="btn btn-primary float-right" name="submit">Add About</button>
            </div>
           
            <div for="img_banner">
                Select Image For About Banner :
                <input type="file" name="banner_img" id="banner_img">
            </div>
            <?php
            if (isset($_SESSION['errors']['banner_img_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['banner_img_er'] ?>
                </span>
            <?php
            }
            ?>
            
            <div class="mt-3" for="img_banner">
                Select Image For Youtube Video Tharmnail :
                <input type="file"  name="tharmnail_img" id="tharmnail_img">
            </div>
            <?php
            if (isset($_SESSION['errors']['tharmnail_img_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['tharmnail_img_er'] ?>
                </span>
            <?php
            }
            ?>

            <label class="w-100" for="">Enter Table Book Number<span class="text-danger">*</span>
                <input type="number" class="form-control" value="<?=isset($_SESSION['old_data']['number']) ? $_SESSION['old_data']['number'] : '' ?>" name="number">
            </label>
            <?php
            if (isset($_SESSION['errors']['number_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['number_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter About Details Text-1<span class="text-danger">*</span>
                <textarea name="about_desone" class="form-control"><?=isset($_SESSION['old_data']['about_desone']) ? $_SESSION['old_data']['about_desone'] : '' ?></textarea>
            </label>
            <?php
            if (isset($_SESSION['errors']['about_desone_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['about_desone_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter About Details Text-2<span class="text-danger">*</span>
                <textarea name="about_destwo" class="form-control"><?=isset($_SESSION['old_data']['about_destwo']) ? $_SESSION['old_data']['about_destwo'] : '' ?></textarea>
            </label>
            <?php
            if (isset($_SESSION['errors']['about_destwo_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['about_destwo_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter About Details list Text-1<span class="text-danger">*</span>
                <textarea name="listone" class="form-control"></textarea>
            </label>
            <?php
            if (isset($_SESSION['errors']['listone_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['listone_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter About Details list Text-2<span class="text-danger">*</span>
                <textarea name="listtwo" class="form-control"></textarea>
            </label>
            <?php
            if (isset($_SESSION['errors']['listtwo_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['listtwo_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter About Details list Text-3<span class="text-danger">*</span>
                <textarea name="listthree" class="form-control"></textarea>
            </label>
            <?php
            if (isset($_SESSION['errors']['listthree_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['listthree_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter Video Link<span class="text-danger">*</span>
                <input type="text" class="form-control" name="video_link">
            </label>
            <?php
            if (isset($_SESSION['errors']['video_link_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['video_link_er'] ?>
                </span>
            <?php
            }
            ?>

    </div>

    </form>
</div>
</div>




<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['errors']);
unset($_SESSION['old_data']);

?>
