<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
  //* some action

  //*assigning all request

  $location_link = $_POST['location_link'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $open_day = $_POST['open_day'];
  $opening_time = $_POST['opening_time'];
  $closing_time = $_POST['closing_time'];
  $close_day = $_POST['close_day'];
  $social_link = $_POST['social_link'];
  // print_r($_POST);
  // exit;

  //* validation
  $errors = [];
  if (empty($location_link)) {
    $errors['location_link_er'] = "Insert  Location Link !";
  }
  if (empty($address)) {
    $errors['address_er'] = "Insert  Address !";
  }
  if (empty($email)) {
    $errors['email_er'] = "Insert  Email !";
  }
  if (empty($number)) {
    $errors['number_er'] = "Insert  Number !";
  }
  if (empty($open_day)) {
    $errors['open_day_er'] = "Insert  Opening Day !";
  }
  if (empty($opening_time)) {
    $errors['opening_time_er'] = "Insert  Opening Time !";
  }
  if (empty($closing_time)) {
    $errors['closing_time_er'] = "Insert  Closing Time !";
  }
  if (empty($close_day)) {
    $errors['close_day_er'] = "Insert  Closed Day !";
  }
  if (empty($social_link)) {
    $errors['social_link_er'] = "Insert  Facebook LInk !";
  }


  if (count($errors) > 0) {
    //*error foud
    $_SESSION['errors'] = $errors;
    $_SESSION['old_data'] = $_POST;
    // print_r($errors);
    header("location: ../backend_files/add_contact_section.php");
  } else {
    //* no errors
    $query = "INSERT INTO  contact_section ( location_link ,  address ,  email ,  number ,  open_day ,  opening_time ,  close_day ,  social_link, closing_time) VALUES ('$location_link','$address','$email','$number','$open_day','$opening_time','$close_day','$social_link' ,'$closing_time')";
    $exe = mysqli_query($conn, $query);
    if ($exe) {
      header("location: ../backend_files/add_contact_section.php");
      $_SESSION['success'] = " Contact Added Succesfully !";

    }
  }
} else {
  //*fill the form
}
