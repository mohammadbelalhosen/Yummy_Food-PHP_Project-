<?php
session_start();
$id = $_GET['id'];
include '../include/env.php';
$qury = "SELECT * FROM tableimg_section WHERE id=$id";
$ex = mysqli_query($conn, $qury);
$fetch = mysqli_fetch_assoc($ex);

$path = '../backend_files/uploads/tableimg_section/' . $fetch['table_image'];

// print_r(file_exists($path));

if (file_exists($path) == 1) {
    unlink($path);
}

$qu = "DELETE FROM tableimg_section WHERE id=$id";
$e = mysqli_query($conn, $qu);
$_SESSION['success'] = "Table & Counter Image Deleted Successfully !";

header("Location: ../backend_files/all_tableimg_section.php");
