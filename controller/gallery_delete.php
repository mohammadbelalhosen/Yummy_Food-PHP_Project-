<?php
session_start();
$id = $_GET['id'];
include '../include/env.php';
$qury = "SELECT * FROM gallery_section WHERE id=$id";
$ex = mysqli_query($conn, $qury);
$fetch = mysqli_fetch_assoc($ex);

$path = '../backend_files/uploads/gallery_section/' . $fetch['gallery_img'];

// print_r(file_exists($path));

if (file_exists($path) == 1) {
    unlink($path);
}

$qu = "DELETE FROM gallery_section WHERE id=$id";
$e = mysqli_query($conn, $qu);
$_SESSION['delete'] = "Gallery Deleted Successfully !";

header("Location: ../backend_files/all_gallery_section.php");
