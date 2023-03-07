
<?php
session_start();
$id = $_GET['id'];
include '../include/env.php';
$qury = "SELECT * FROM counter_section WHERE id=$id";
$ex = mysqli_query($conn, $qury);
$fetch = mysqli_fetch_assoc($ex);

$path = '../backend_files/uploads/counter_img/' . $fetch['counter_img'];

// print_r(file_exists($path));

if (file_exists($path) == 1) {
    unlink($path);
}

$qu = "DELETE FROM counter_section WHERE id=$id";
$e = mysqli_query($conn, $qu);
$_SESSION['success'] = "Counter Deleted Successfully !";

header("Location: ../backend_files/all_counter_section.php");
