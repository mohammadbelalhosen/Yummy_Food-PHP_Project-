<?php
session_start();
$id = $_GET['id'];
include '../include/env.php';
$qury = "SELECT img_banner FROM add_banner_part WHERE id=$id";
$ex = mysqli_query($conn, $qury);
$fetch = mysqli_fetch_assoc($ex);

$path = '../backend_files/uploads/' . $fetch['img_banner'];

// print_r(file_exists($path));

if (file_exists($path) == 1) {
    unlink($path);
}

$qu = "DELETE FROM add_banner_part WHERE id=$id";
$e = mysqli_query($conn, $qu);
$_SESSION['delete'] = "Banner Deleted Successfully !";

header("Location: ../backend_files/all_banner.php");
