<?php
session_start();
if (isset($_POST['submit'])) {
    include '../include/env.php';
    $id = $_POST['id'];
    $number = $_POST['number'];
    $about_desone = $_POST['about_desone'];
    $about_destwo = $_POST['about_destwo'];
    $listone = $_POST['listone'];
    $listtwo = $_POST['listtwo'];
    $listthree = $_POST['listthree'];
    $video_link = $_POST['video_link'];
    $image_nameone = $_POST['image_nameone']; //old image name1
    $image_nametwo = $_POST['image_nametwo']; //old image name2
    $banner_img = $_FILES['banner_img'];
    $tharmnail_img = $_FILES['tharmnail_img'];


    // print_r($banner_img);
    // exit();
    //*image processing
    if ($banner_img['size'] == 0 and $tharmnail_img['size'] == 0) {
        $update = "UPDATE    about_section    SET     number   ='$number',   about_desone   ='$about_desone',   about_destwo   ='$about_destwo',   listone   ='$listone',   listtwo   ='$listtwo',   listthree   ='$listthree',   video_link   ='$video_link'  WHERE id = $id";
        $exute = mysqli_query($conn, $update);
        header("Location: ../backend_files/all_about_section.php");
    } else {

        if (file_exists("../backend_files/uploads/about_section/about_bannera_img/$image_nameone") and file_exists("../backend_files/uploads/about_section/tharmnail_img/$image_nametwo")) {

            $extension = pathinfo($banner_img['name'])['extension'];
            $extensiontwo = pathinfo($tharmnail_img['name'])['extension'];
            $img_name = "banner-" . uniqid() . '.' . $extension; //new image name1
            $img_nametwo = "tharmnail-" . uniqid() . '.' . $extensiontwo; //new image name2
            unlink("../backend_files/uploads/about_section/about_bannera_img/$image_nameone");
            unlink("../backend_files/uploads/about_section/tharmnail_img/$image_nametwo");
            move_uploaded_file($banner_img['tmp_name'], "../backend_files/uploads/about_section/about_bannera_img/$img_name");
            move_uploaded_file($tharmnail_img['tmp_name'], "../backend_files/uploads/about_section/tharmnail_img/$img_nametwo");
            $update = "UPDATE  about_section  SET number ='$number', about_desone ='$about_desone', about_destwo ='$about_destwo', listone ='$listone', listtwo ='$listtwo', listthree ='$listthree', video_link ='$video_link', banner_img ='$img_name', tharmnail_img ='$img_nametwo' WHERE id = $id";
            $exute = mysqli_query($conn, $update);
            if ($exute) {

                header("Location: ../backend_files/all_about_section.php");
            }
        }
    }

    $_SESSION['success'] = "About Section Update Successfully";
}
