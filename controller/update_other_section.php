<?php
session_start();
if (isset($_POST['submit'])) {
    include '../include/env.php';
    $id = $_POST['id'];
    $url = $_POST['url'];
    $r_name = $_POST['r_name'];
    // print_r($img_banner);
    // exit();


    $update = "UPDATE  other_section  SET  url ='$url', r_name ='$r_name' WHERE id = $id";
    $exute = mysqli_query($conn, $update);
    if ($exute) {

        header("Location: ../backend_files/all_other_section.php");
    }
    $_SESSION['success'] = "Other Item Update Successfully";
}
