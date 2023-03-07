<?php
include './backend_slicePart_inc/header.php';
include '../include/env.php';

$id = $_GET['id'];

//this part is for fetch food data
$select = "SELECT * FROM foods WHERE id= $id";
$data = mysqli_query($conn, $select);
$results = mysqli_fetch_assoc($data);

//this part is fetch for catagories
$selecttwo = "SELECT * FROM catagories WHERE status='1'";
$datatwo = mysqli_query($conn, $selecttwo);
$records = mysqli_fetch_all($datatwo, 1);

//this part is for catagory auto select
$catid = $results['catagory_id'];
$selectthree = "SELECT * FROM catagories INNER JOIN foods ON catagories.id = foods.catagory_id WHERE catagories.id = $catid GROUP BY catagories.id;";
$datathree = mysqli_query($conn, $selectthree);
$catrec = mysqli_fetch_assoc($datathree);
// print_r($catrec);   
// exit; 
?>



<div class="card">
    <div class="card-header bg-primary text-light">
        <span>Edit Foods Section</span>
    </div>
    <div class="card-body">
        <form action="../controller/update_food.php" method="POST" enctype="multipart/form-data">

            <input type="text" name="image_name" value="<?= $results['food_img_name'] ?>" class="d-none">
            <input type="number" name="id" value="<?= $id ?>" class="d-none">
            <div class="row">
                <div class="col-3">
                    <!-- //*if click the image then choose img file  -->
                    <label for="event_img">
                        <img class="img" src="./uploads/foods/<?= $results['food_img_name'] ?>" style="width: 100%;">
                        <input type="file" class="d-none imageInput" name="food_img" id="event_img" value="./uploads/foods/<?= $results['food_img_name'] ?>">
                    </label>
                </div>
                <div class="col-9">
                    <button type="submit" class="btn btn-primary float-right" name="submit">Update Food</button>
                    <label class="w-100" for="">Enter Food Name<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="food_name" value="<?= $results['food_name'] ?>">

                    </label>

                    <label for="" class="w-100">Enter Food Description<span class="text-danger">*</span>
                        <textarea name="food_des" class="form-control"><?= $results['food_des'] ?></textarea>

                    </label>

                    <label for="" class="w-100">Enter Food Price<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="food_price" value="<?= $results['food_price'] ?>">

                    </label>

                    <label for="" class="w-100">Enter Food Price Discount<span class="text-danger">*</span>
                        <input type="text" class="form-control" name="food_discount" value="<?= $results['food_discount'] ?>">
                    </label>
                    <label for="" class="w-100">Select Catagory<span class="text-danger">*</span>
                        <select class="form-control" name="catagory_id">
                            <option><?= $catrec['catagory'] ?></option>
                            <?php
                            foreach ($records as $key => $result) {
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