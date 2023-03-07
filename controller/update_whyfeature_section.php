<?php
session_start();
if (isset($_POST['submit'])) {
    include '../include/env.php';
    $id = $_POST['id'];
    $white_card_icon = $_POST['white_card_icon'];
    $white_card_title = $_POST['white_card_title'];
    $white_card_des = $_POST['white_card_des'];
    // print_r($img_banner);
    // exit();


    $update = "UPDATE  feature_section  SET  white_card_icon ='$white_card_icon', white_card_title ='$white_card_title', white_card_des ='$white_card_des' WHERE id = $id";
    $exute = mysqli_query($conn, $update);
    if ($exute) {

        header("Location: ../backend_files/all_whyfeature_section.php");
    }

    $_SESSION['success'] = "Feature Card Update Successfully";
}
