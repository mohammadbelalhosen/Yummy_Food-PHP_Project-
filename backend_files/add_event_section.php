<?php
include './backend_slicePart_inc/header.php';
?>

<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Add Event Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/add_event_section.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <!-- //*if click the image then choose img file  -->
                    <label for="img_banner">
                        <img class="img" src="./img/placehold.png" style="width: 100%;">
                        <input type="file" class="d-none imageInput" name="event_img" id="img_banner">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['event_img_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['event_img_er'] ?>
                        </span>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-9">
                    <button type="submit" class="btn btn-primary float-right" name="submit">Add Event</button>
                    <label class="w-100" for="">Enter Event Title<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="event_title">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['event_title_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['event_title_er'] ?>
                        </span>
                    <?php
                    }
                    ?>
                    <label for="" class="w-100">Enter Event Description<span class="text-danger">*</span>
                        <textarea name="event_des" class="form-control"></textarea>
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['event_des_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['event_des_er'] ?>
                        </span>
                    <?php
                    }
                    ?>
                    <label for="" class="w-100">Enter Event Price<span class="text-danger">*</span>
                        <input type="number" class="form-control" name="event_price">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['event_price_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['event_price_er'] ?>
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