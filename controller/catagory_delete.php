<?php
session_start();
include '../include/env.php';
$id = $_GET['id'];
$sel = "SELECT food_img_name FROM foods WHERE catagory_id=$id";
$res = mysqli_query($conn, $sel);
$fetch = mysqli_fetch_assoc($res);
$image_name = $fetch['food_img_name'];
$path  = "../backend_files/uploads/foods/$image_name";
if (file_exists($path)) {
    //*if file exists then delete file and after delete cat or food 
    unlink($path);
    $delete_cat_query = "DELETE FROM catagories WHERE id=$id";
    $data = mysqli_query($conn, $delete_cat_query);
    $delete_food_query = "DELETE FROM foods WHERE catagory_id=$id";
    $data = mysqli_query($conn, $delete_food_query);
    $_SESSION['delete'] = "Catagory Deleted Successfully !";
}
// print_r(file_exists($path));
// print_r($path);
header("Location: ../backend_files/add_catagory_section.php");
