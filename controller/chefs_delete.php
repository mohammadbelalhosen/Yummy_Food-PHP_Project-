<?php
session_start();
$id = $_GET['id'];
include '../include/env.php';
$qury = "SELECT chefs_img FROM chefs_section WHERE id=$id";
$ex = mysqli_query($conn, $qury);
$fetch = mysqli_fetch_assoc($ex);

$path = '../backend_files/uploads/Chefs_section/chefs_img/' . $fetch['chefs_img'];

// print_r(file_exists($path));

if (file_exists($path) == 1) {
    unlink($path);
}

$qu = "DELETE FROM chefs_section WHERE id=$id";
$e = mysqli_query($conn, $qu);

$_SESSION['success'] = "Chefs Deleted Successfully !";
header("Location: ../backend_files/all_chefs_section.php");
