<?php
session_start();
$id = $_GET['id'];
include '../include/env.php';
$qury = "SELECT banner_img,tharmnail_img FROM about_section WHERE id=$id";
$ex = mysqli_query($conn, $qury);
$fetch = mysqli_fetch_assoc($ex);

$path = '../backend_files/uploads/about_section/about_bannera_img/' . $fetch['banner_img'];
$pathtwo = '../backend_files/uploads/about_section/tharmnail_img/' . $fetch['tharmnail_img'];

// print_r(file_exists($path));

if (file_exists($path) == 1) {
    unlink($path);
}
if (file_exists($pathtwo) == 1) {
    unlink($pathtwo);
}

$qu = "DELETE FROM about_section WHERE id=$id";
$e = mysqli_query($conn, $qu);

header("Location: ../backend_files/all_about_section.php");
$_SESSION['success'] = "About Delete Successfully !";
