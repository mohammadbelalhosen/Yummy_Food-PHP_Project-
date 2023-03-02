<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
  //* some action

  //*assigning all request

  $gallery_img = $_FILES['gallery_img'];
  $extension = pathinfo($gallery_img['name'])['extension'];
  $ecepted_files = ['png', 'jpg', 'svg', 'JPG', 'jpeg'];
  $found_img =  in_array($extension, $ecepted_files);
  // print_r($extention);
  // exit;

  //* validation
  $errors = [];
  if ($gallery_img['size'] == 0) {
    $errors['gallery_img_er'] = "Insert  A  Image !";
  } elseif ($found_img == false) {
    $errors['gallery_img_er'] = "Insert  A Proper  Image !";
  }

  if (count($errors) > 0) {
    //*error foud
    $_SESSION['errors'] = $errors;
    // print_r($errors);
    header("location: ../backend_files/add_gallery_section.php");
  } else {
    //* no errors
    //* image processing

    $image_name = 'banner-' . uniqid() . '.' . $extension;

    move_uploaded_file($gallery_img['tmp_name'], "../backend_files/uploads/gallery_section/$image_name");

    // print_r($banner_img);
    $query = "INSERT INTO  gallery_section (gallery_img) VALUES ('$image_name')";
    $exe = mysqli_query($conn, $query);
    if ($exe) {
      header("location: ../backend_files/add_gallery_section.php");
      $_SESSION['success'] = " Gallery Added Succesfully !";
    }
  }
} else {
  //*fill the form
}
