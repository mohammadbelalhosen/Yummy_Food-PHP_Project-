<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';
$select = "SELECT * FROM catagories WHERE status='1'";
$data = mysqli_query($conn, $select);
$results = mysqli_fetch_all($data, 1);

// print_r($results);    
?>


<?php
if (isset($_SESSION['success'])) {
?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute;top:10px;right:10px">
        <div class="toast-header">
            <strong class="me-auto">Add Food</strong>
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
        <span>Add Foods Section</span>
    </div>
    <div class="card-body">
        <input type="number" name="id" class="d-none">
        <form action="../controller/add_food.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <!-- //*if click the image then choose img file  -->
                    <label for="event_img">
                        <img class="img" src="./img/placehold.png" style="width: 100%;">
                        <input type="file" class="d-none imageInput" name="food_img" id="event_img">
                        <?php
                        if (isset($_SESSION['errors']['event_img_error'])) {
                        ?>
                            <span class="text-danger"><?= $_SESSION['errors']['event_img_error'] ?></span>
                        <?php
                        }
                        ?>
                    </label>
                </div>
                <div class="col-9">
                    <button type="submit" class="btn btn-primary float-right" name="submit">Add Food</button>
                    <label class="w-100" for="">Enter Food Name<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="food_name">
                        <?php
                        if (isset($_SESSION['errors']['event_title_error'])) {
                        ?>
                            <span class="text-danger"><?= $_SESSION['errors']['event_title_error'] ?></span>
                        <?php
                        }
                        ?>
                    </label>

                    <label for="" class="w-100">Enter Food Description<span class="text-danger">*</span>
                        <textarea name="food_des" class="form-control"></textarea>
                        <?php
                        if (isset($_SESSION['errors']['event_des_error'])) {
                        ?>
                            <span class="text-danger"><?= $_SESSION['errors']['event_des_error'] ?></span>
                        <?php
                        }
                        ?>
                    </label>

                    <label for="" class="w-100">Enter Food Price<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="food_price">
                        <?php
                        if (isset($_SESSION['errors']['event_price_error'])) {
                        ?>
                            <span class="text-danger"><?= $_SESSION['errors']['event_price_error'] ?></span>
                        <?php
                        }
                        ?>
                    </label>

                    <label for="" class="w-100">Enter Food Price Discount<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="food_discount">
                    </label>
                    <label for="" class="w-100">Select Catagory<span class="text-danger">*</span>
                        <select class="form-control" name="catagory_id" id="">
                            <option value="" disabled selected>Select Catagory</option>
                            <?php
                            foreach ($results as $key => $result) {
                            ?>
                                <option value="<?= $result['id'] ?>"><?= $result['catagory'] ?></option>
                            <?php
                            }
                            ?>
                        </select>




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
    let imageInput = document.querySelector(".imageInput")
    let img = document.querySelector(".img")
    imageInput.addEventListener('change', function(event) {
        let url = window.URL.createObjectURL(event.target.files[0])
        img.src = url
        //    console.log (event.target.files[0]);
    })
</script>