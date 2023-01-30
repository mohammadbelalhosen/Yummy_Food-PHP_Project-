<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
  //* some action

  //*assigning all request

  $banner_title = $_POST['banner_title'];
  $banner_des = $_POST['banner_des'];
  $video_link = $_POST['video_link'];
  $banner_img = $_FILES['banner_img'];
  $extension = pathinfo($banner_img['name'])['extension'];
  $ecepted_files = ['png', 'jpg', 'svg', 'JPG', 'jpeg'];
  $found_img =  in_array($extension, $ecepted_files);
  // print_r($extention);
  // exit;

  //* validation
  $errors = [];
  if (empty($banner_title)) {
    $errors['banner_title_error'] = "Insert  Banner Title !";
  }
  if (empty($banner_des)) {
    $errors['banner_des_error'] = "Insert  Banner Description !";
  }
  if (empty($video_link)) {
    $errors['video_link_error'] = "Insert  Video Link !";
  }
  if ($banner_img['size'] == 0) {
    $errors['banner_img_error'] = "Insert  A Banner Image !";
  } elseif ($found_img == false) {
    $errors['banner_img_error'] = "Insert  A Proper Banner Image !";
  }

  if (count($errors) > 0) {
    //*error foud
    $_SESSION['errors'] = $errors;
    // print_r($errors);
    header("location: ../backend_files/add_banner.php");
  } else {
    //* no errors
    //* image processing

    $image_name = 'banner-' . uniqid() . '.' . $extension;

    move_uploaded_file($banner_img['tmp_name'], "../backend_files/uploads/$image_name");

    // print_r($banner_img);
    $query = "INSERT INTO add_banner_part(img_banner, banner_title, banner_des, video_link) VALUES ('$image_name','$banner_title','$banner_des','$video_link')";
    $exe = mysqli_query($conn, $query);
    if ($exe) {
      header("location: ../backend_files/add_banner.php");
      $_SESSION['success'] = " Banner Added Succesfully !";
    }
  }
} else {
  //*fill the form
}
