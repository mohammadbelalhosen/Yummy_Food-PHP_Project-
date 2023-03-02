<?php
include '../include/env.php';
$id = $_GET['id'];
$select = "SELECT * FROM chefs_section WHERE id=$id";
$data = mysqli_query($conn, $select);
$results = mysqli_fetch_assoc($data);
// print_r($results);

if ($results['status'] == 0) {
    $query = "UPDATE chefs_section SET status='1' WHERE id=$id";
    $exu = mysqli_query($conn, $query);
} else {
    $query = "UPDATE chefs_section SET status='0' WHERE id=$id";
    $exu = mysqli_query($conn, $query);
}
header("Location: ../backend_files/all_chefs_section.php");
