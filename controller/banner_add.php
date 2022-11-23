<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
  //* some action

  //*assigning all request
  $banner_img = $_POST['banner_img'];
  $banner_title = $_POST['banner_title'];
  $banner_des = $_POST['banner_des'];
  $video_link = $_POST['video_link'];

  $query = "INSERT INTO add_banner_part(img_banner, banner_title, banner_des, video_link) VALUES ('$banner_img','$banner_title','$banner_des','$video_link')";
  $exe = mysqli_query($conn, $query);
  if ($exe) {
    header("location: ../backend_files/add_banner.php");
    $_SESSION['success'] = "Your Banner Added Succesfully !";
  }
} else {
  //*fill the form
}
