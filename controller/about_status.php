<?php

$id=$_GET['id'];

include'../include/env.php';

$query = "SELECT * FROM about_section WHERE id=$id";
$ex = mysqli_query($conn,$query);

$results = mysqli_fetch_assoc($ex);

$status_de = "UPDATE about_section SET status = '0'";
$exe = mysqli_query($conn,$status_de);

// print_r($results['status']);

if($results['status'] == 0){
    $query = "UPDATE about_section SET status= '1' WHERE id=$id";
    $exu = mysqli_query($conn,$query);
}else{
    $query = "UPDATE about_section SET status= '0' WHERE id=$id";
    $exu = mysqli_query($conn,$query);
}

header("Location: ../backend_files/all_about_section.php ");