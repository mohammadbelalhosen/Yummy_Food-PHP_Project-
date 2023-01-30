<?php
session_start();
if (isset($_POST['submit'])) {
    include '../include/env.php';
    $id = $_POST['id'];
    $title = $_POST['banner_title'];
    $des = $_POST['banner_des'];
    $link = $_POST['video_link'];
    $banner_name = $_POST['banner_name']; //old image name
    $img = $_FILES['banner_img'];
    $img_banner = $_FILES['banner_img'];

    // print_r($img_banner);
    // exit();
    //*image processing
    if ($img_banner['size'] == 0) {
        $update = "UPDATE add_banner_part SET banner_title='$title',banner_des='$des',video_link='$link' WHERE id='$id'";
        $exute = mysqli_query($conn, $update);
        header("Location: ../backend_files/all_banner.php");
    } else {

        if (file_exists("../backend_files/uploads/$banner_name")) {
            if (!file_exists('../backend_files/uploads')) {
                mkdir("../backend_files/uploads");
            }
            $extension = pathinfo($img['name'])['extension'];
            $img_name = "banner-" . uniqid() . '.' . $extension; //new image name
            unlink("../backend_files/uploads/$banner_name");
            move_uploaded_file($img['tmp_name'], "../backend_files/uploads/$img_name");
            $update = "UPDATE add_banner_part SET img_banner='$img_name',banner_title='$title',banner_des='$des',video_link='$link' WHERE id='$id'";
            $exute = mysqli_query($conn, $update);
            if ($exute) {

                header("Location: ../backend_files/all_banner.php");
            }
        }
    }

    $_SESSION['success'] = "Banner Update Successfully";
}
