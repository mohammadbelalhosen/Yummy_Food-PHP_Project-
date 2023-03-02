<?php
session_start();
if (isset($_POST['submit'])) {
    include '../include/env.php';
    $id = $_POST['id'];
    $food_name = $_POST['food_name'];
    $food_des = $_POST['food_des'];
    $food_price = $_POST['food_price'];
    $food_discount = $_POST['food_discount'];
    $catagory_id = $_POST['catagory_id'];
    $image_name = $_POST['image_name']; //old image name
    $food_img = $_FILES['food_img'];
    // $img_banner = $_FILES['banner_img'];

    // print_r($food_img);
    // exit();
    //*image processing
    if ($food_img['size'] == 0) {
        $update = "UPDATE  foods  SET  food_name ='$food_name', food_des ='$food_des', food_price ='$food_price',  food_discount ='$food_discount' WHERE id = $id";
        $exute = mysqli_query($conn, $update);
        header("Location: ../backend_files/all_foods.php");
    } else {

        if (file_exists("../backend_files/uploads/foods/$image_name")) {
            
            $extension = pathinfo($food_img['name'])['extension'];
            $img_name = "banner-" . uniqid() . '.' . $extension; //new image name
            unlink("../backend_files/uploads/foods/$image_name");
            move_uploaded_file($food_img['tmp_name'], "../backend_files/uploads/foods/$img_name");
            $update = "UPDATE   foods   SET food_name  ='$food_name',  food_des  ='$food_des',  food_price  ='$food_price',  food_img_name  ='$img_name',  food_discount  ='$food_discount' WHERE id=$id";
            $exute = mysqli_query($conn, $update);
            if ($exute) {

                header("Location: ../backend_files/all_foods.php");
            }
        }
    }

    $_SESSION['success'] = "Foods Update Successfully";
}
