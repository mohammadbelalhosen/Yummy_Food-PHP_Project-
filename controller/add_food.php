<?php
include '../include/env.php';
if (isset($_POST['submit'])) {
    //*assigning request
    $food_name = $_POST['food_name'];
    $food_des = $_POST['food_des'];
    $food_price = $_POST['food_price'];
    $food_img = $_FILES['food_img'];
    $catagory_id = $_POST['catagory_id'];

    $food_img_name = $food_img['name'];
    $extension = pathinfo($food_img['name'])['extension'];

    // print_r($food_img_name);
    //*validation
    // ---------------------------------------

    //*image upload


    $img_name = 'food-' . uniqid() . '.' . $extension; //new image name
    if (!file_exists("../backend_files/uploads/foods")) {
        mkdir("../backend_files/uploads/foods");
    }
    $path = "../backend_files/uploads/foods/$img_name";
    move_uploaded_file($food_img['tmp_name'], $path);
    $insert = "INSERT INTO foods (food_name, food_des,food_price,food_img_name,catagory_id) VALUES ('$food_name','$food_des','$food_price','$img_name','$catagory_id')";
    $data = mysqli_query($conn, $insert);
    header("Location: ../backend_files/add_food_section.php");
}
