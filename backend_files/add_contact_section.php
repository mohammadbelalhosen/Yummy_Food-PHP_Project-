<?php
include './backend_slicePart_inc/header.php';
?>
<!-- toast massage -->
<?php
if (isset($_SESSION['success'])) {
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="z-index:1;position:absolute;bottom:110px;right:20px">
        <div class="toast-header">
            <strong class="me-auto">Add Contact</strong>
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
        <span>Add Contact</span>
    </div>
    <div class="card-body">
        <form action="../controller/add_contact_section.php" method="POST" enctype="multipart/form-data">

            <button type="submit" class="btn btn-primary float-right" name="submit">Add Contact</button>
            <label class="w-100" for="">Enter Location Link<span class="text-danger">*</span>
                <input type="text" class="form-control" name="location_link" value="<?=isset($_SESSION['old_data']['location_link']) ? $_SESSION['old_data']['location_link'] : ''?>">
            </label>
            <?php
            if (isset($_SESSION['errors']['location_link_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['location_link_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter Address<span class="text-danger">*</span>
                <textarea name="address" class="form-control"><?=isset($_SESSION['old_data']['address']) ? $_SESSION['old_data']['address'] : ''?></textarea>
            </label>
            <?php
            if (isset($_SESSION['errors']['address_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['address_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter Email<span class="text-danger">*</span>
                <input type="email" class="form-control" name="email" value="<?=isset($_SESSION['old_data']['email']) ? $_SESSION['old_data']['email'] : ''?>">
            </label>
            <?php
            if (isset($_SESSION['errors']['email_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['email_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter Phone Number<span class="text-danger">*</span>
                <input type="number" class="form-control" name="number" value="<?=isset($_SESSION['old_data']['number']) ? $_SESSION['old_data']['number'] : ''?>">
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
            <label for="" class="w-100">Enter Opening Day<span class="text-danger">*</span>
                <input type="text" class="form-control" name="open_day" value="<?=isset($_SESSION['old_data']['open_day']) ? $_SESSION['old_data']['open_day'] : ''?>">
            </label>
            <?php
            if (isset($_SESSION['errors']['open_day_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['open_day_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter Opening Time<span class="text-danger">*</span>
                <input type="text" class="form-control" name="open_time" value="<?=isset($_SESSION['old_data']['open_time']) ? $_SESSION['old_data']['open_time'] : ''?>">
            </label>
            <?php
            if (isset($_SESSION['errors']['open_time_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['open_time_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter Closed Day<span class="text-danger">*</span>
                <input type="text" class="form-control" name="close_day" value="<?=isset($_SESSION['old_data']['close_day']) ? $_SESSION['old_data']['close_day'] : ''?>">
            </label>
            <?php
            if (isset($_SESSION['errors']['close_day_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['close_day_er'] ?>
                </span>
            <?php
            }
            ?>
            <label for="" class="w-100">Enter Facebook Link<span class="text-danger">*</span>
                <input type="text" class="form-control" name="social_link" value="<?=isset($_SESSION['old_data']['social_link']) ? $_SESSION['old_data']['social_link'] : ''?>">
            </label>
            <?php
            if (isset($_SESSION['errors']['social_link_er'])) {
            ?>
                <span class="text-danger">
                    <?= $_SESSION['errors']['social_link_er'] ?>
                </span>
            <?php
            }
            ?>

        </form>
    </div>
</div>




<?php
include './backend_slicePart_inc/footer.php';
unset($_SESSION['errors']);
unset($_SESSION['old_data']);

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