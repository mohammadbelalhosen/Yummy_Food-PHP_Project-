<?php
session_start();
$id = $_GET['id'];
include '../include/env.php';
$qury = "SELECT * FROM event_section WHERE id=$id";
$ex = mysqli_query($conn, $qury);
$fetch = mysqli_fetch_assoc($ex);

$path = '../backend_files/uploads/event_section/' . $fetch['event_img'];

// print_r(file_exists($path));

if (file_exists($path) == 1) {
    unlink($path);
}

$qu = "DELETE FROM event_section WHERE id=$id";
$e = mysqli_query($conn, $qu);
$_SESSION['delete'] = "Event Deleted Successfully !";

header("Location: ../backend_files/all_event_section.php");
