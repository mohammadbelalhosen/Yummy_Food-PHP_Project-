<?php
session_start();
if (isset($_POST['submit'])) {
    include '../include/env.php';
    $id = $_POST['id'];
    $event_title = $_POST['event_title'];
    $event_des = $_POST['event_des'];
    $event_price = $_POST['event_price'];
    $image_name = $_POST['image_name']; //old image name
    $img = $_FILES['event_img'];
    // $img_banner = $_FILES['banner_img'];

    // print_r($img_banner);
    // exit();
    //*image processing
    if ($img['size'] == 0) {
        $update = "UPDATE  event_section  SET event_title ='$event_title', event_des ='$event_des', event_price ='$event_price' WHERE id = $id";
        $exute = mysqli_query($conn, $update);
        header("Location: ../backend_files/all_event_section.php");
    } else {

        if (file_exists("../backend_files/uploads/event_section/$image_name")) {
            $extension = pathinfo($img['name'])['extension'];
            $img_name = "banner-" . uniqid() . '.' . $extension; //new image name
            unlink("../backend_files/uploads/event_section/$image_name");
            move_uploaded_file($img['tmp_name'], "../backend_files/uploads/event_section/$img_name");
            $update = "UPDATE  event_section  SET event_title ='$event_title', event_des ='$event_des', event_price ='$event_price', event_img ='$img_name' WHERE id = $id";
            $exute = mysqli_query($conn, $update);
            if ($exute) {

                header("Location: ../backend_files/all_event_section.php");
            }
        }
    }

    $_SESSION['success'] = "Event Update Successfully";
}
