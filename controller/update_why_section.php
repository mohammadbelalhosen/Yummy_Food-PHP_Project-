<?php
session_start();
if (isset($_POST['submit'])) {
    include '../include/env.php';
    $id = $_POST['id'];
    $red_card_title = $_POST['red_card_title'];
    $red_card_des = $_POST['red_card_des'];
    // print_r($img_banner);
    // exit();


    $update = "UPDATE  why_section  SET  red_card_des ='$red_card_des' WHERE id = $id";
    $exute = mysqli_query($conn, $update);
    if ($exute) {

        header("Location: ../backend_files/all_why_section.php");
    }

    $_SESSION['success'] = "Why Card Update Successfully";
}
