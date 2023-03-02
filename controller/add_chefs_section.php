<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
  //* some action

  //*assigning all request

  $chefs_name = $_POST['chefs_name'];
  $job_title = $_POST['job_title'];
  $chefs_des = $_POST['chefs_des'];
  $profile_link = $_POST['profile_link'];
  $chefs_img = $_FILES['chefs_img'];
  $extension = pathinfo($chefs_img['name'])['extension'];
  $ecepted_files = ['png', 'jpg', 'svg', 'JPG', 'jpeg'];
  $found_img =  in_array($extension, $ecepted_files);
  // print_r($extention);
  // exit;

  //* validation
  $errors = [];
  if (empty($chefs_name)) {
    $errors['chefs_name_er'] = "Insert  A Chefs Name !";
  }
  if (empty($job_title)) {
    $errors['job_title_er'] = "Insert  A Job Title!";
  }
  if (empty($chefs_des)) {
    $errors['chefs_des_er'] = "Insert  Chefs Des!";
  }
  if (empty($profile_link)) {
    $errors['profile_link_er'] = "Insert  Facebook Profile Link!";
  }
  if ($chefs_img['size'] == 0) {
    $errors['chefs_img_er'] = "Insert  A Chefs Image !";
  } elseif ($found_img == false) {
    $errors['chefs_img_er'] = "Insert  A Proper Chefs Image !";
  }

  if (count($errors) > 0) {
    // *error foud
    $_SESSION['errors'] = $errors;
    // print_r($errors);
    header("location: ../backend_files/add_chefs_section.php");
  } else {
    //* no errors
    //* image processing

    $image_name = 'chefs-' . uniqid() . '.' . $extension;

    move_uploaded_file($chefs_img['tmp_name'], "../backend_files/uploads/Chefs_section/chefs_img/$image_name");

    // print_r($banner_img);
    $query = "INSERT INTO   chefs_section  (chefs_name  ,   job_title  ,   chefs_des  ,   profile_link  ,   chefs_img ) VALUES ('$chefs_name','$job_title','$chefs_des','$profile_link','$image_name')";
    $exe = mysqli_query($conn, $query);
    if ($exe) {
      header("location: ../backend_files/add_chefs_section.php");
      $_SESSION['success'] = " Chefs Added Succesfully !";
    }
  }
} else {
  //*fill the form
}
