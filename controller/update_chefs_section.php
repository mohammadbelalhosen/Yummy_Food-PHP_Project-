<?php
session_start();
if (isset($_POST['submit'])) {
    include '../include/env.php';
    $id = $_POST['id'];
    $chefs_name = $_POST['chefs_name'];
    $job_title = $_POST['job_title'];
    $chefs_des = $_POST['chefs_des'];
    $profile_link = $_POST['profile_link'];
    $image_name = $_POST['image_name']; //old image name1
    $chefs_img = $_FILES['chefs_img'];



    // print_r($_POST);
    // exit();
    //*image processing
    if ($chefs_img['size'] == 0) {
        $update = "UPDATE  chefs_section  SET chefs_name ='$chefs_name', job_title ='$job_title', chefs_des ='$chefs_des', profile_link ='$profile_link' WHERE id = $id";
        $exute = mysqli_query($conn, $update);
        header("Location: ../backend_files/all_chefs_section.php");
    } else {

        if (file_exists("../backend_files/uploads/about_section/about_bannera_img/$image_nameone")) {

            $extension = pathinfo($chefs_img['name'])['extension'];
            $img_name = "banner-" . uniqid() . '.' . $extension; //new image name1
            unlink("../backend_files/uploads/Chefs_section/chefs_img/$image_name");
            move_uploaded_file($chefs_img['tmp_name'], "../backend_files/uploads/Chefs_section/chefs_img/$img_name");
            $update = "UPDATE  chefs_section  SET chefs_name ='$chefs_name', job_title ='$job_title', chefs_des ='$chefs_des', profile_link ='$profile_link', chefs_img ='$img_name' WHERE id = $id";
            $exute = mysqli_query($conn, $update);
            if ($exute) {

                header("Location: ../backend_files/all_chefs_section.php");
            }
        }
    }

    $_SESSION['success'] = "Chefs Section Update Successfully";
}
