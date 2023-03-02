<?php
session_start();
if (isset($_POST['submit'])) {
    include '../include/env.php';
    $id = $_POST['id'];
    $location_link = $_POST['location_link'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $open_day = $_POST['open_day'];
    $open_time = $_POST['open_time'];
    $close_day = $_POST['close_day'];
    $social_link = $_POST['social_link'];
    // print_r($img_banner);
    // exit();


    $update = "UPDATE  contact_section  SET  location_link ='$location_link', address ='$address', email ='$email', number ='$number', open_day ='$open_day', open_time ='$open_time', close_day ='$close_day', social_link ='$social_link' WHERE id = $id";
    $exute = mysqli_query($conn, $update);
    if ($exute) {

        header("Location: ../backend_files/all_contact_section.php");
    }



    $_SESSION['success'] = "Contact Update Successfully";
}
