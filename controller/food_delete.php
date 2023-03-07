<?php
session_start();
include '../include/env.php';
$id = $_GET['id'];

// print_r($id);

$sel = "SELECT * FROM foods WHERE id=$id";
$res = mysqli_query($conn, $sel);
$fetch = mysqli_fetch_assoc($res);
$image_name = $fetch['food_img_name'];
$path  = "../backend_files/uploads/foods/$image_name";
if (file_exists($path)) {
    //*if file exists then delete file and after delete  food 
    unlink($path);
    $delete_food_query = "DELETE FROM foods WHERE id=$id";
    $data = mysqli_query($conn, $delete_food_query);
    $_SESSION['success'] = "Food Deleted Successfully !";
}
// print_r(file_exists($path));
// print_r($image_name);
header("Location: ../backend_files/all_foods.php");
