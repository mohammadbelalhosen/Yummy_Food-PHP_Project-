<?php
include './backend_slicePart_inc/header.php';
?>
<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Add Counter Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/add_counter_section.php" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div>
                    <button type="submit" class="btn btn-primary float-right" name="submit">Add Counter</button>
                    <label class="w-100 " for="">Enter Number<span class="text-danger">*</span>
                        <input type="number" class="form-control" name="counter">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['counter_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['counter_er'] ?>
                        </span>
                    <?php
                    }
                    ?>
                    <label for="" class="w-100">Enter Counter Name<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="counter_name">
                    </label>
                    <?php
                    if (isset($_SESSION['errors']['counter_name_er'])) {
                    ?>
                        <span class="text-danger">
                            <?= $_SESSION['errors']['counter_name_er'] ?>
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