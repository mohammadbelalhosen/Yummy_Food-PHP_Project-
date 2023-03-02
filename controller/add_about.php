<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
    //* some action

    //*assigning all request

    $number = $_POST['number'];
    $about_desone = $_POST['about_desone'];
    $about_destwo = $_POST['about_destwo'];
    $listone = $_POST['listone'];
    $listtwo = $_POST['listtwo'];
    $listthree = $_POST['listthree'];
    $video_link = $_POST['video_link'];
    $banner_img = $_FILES['banner_img'];
    $tharmnail_img = $_FILES['tharmnail_img'];
    $extension = pathinfo($banner_img['name'])['extension'];
    $extensiontwo = pathinfo($tharmnail_img['name'])['extension'];
    $ecepted_files = ['png', 'jpg', 'svg', 'JPG', 'jpeg'];
    $found_img =  in_array($extension, $ecepted_files);
    //   print_r($extensiontwo);
    // exit;

    //* validation
    $errors = [];
    if (empty($number)) {
        $errors['number_er'] = "Insert  A Number !";
    }
    if (empty($about_desone)) {
        $errors['about_desone_er'] = "Insert  About Details !";
    }
    if (empty($about_destwo)) {
        $errors['about_destwo_er'] = "Insert  About Details !";
    }
    if (empty($listone)) {
        $errors['listone_er'] = "Insert  About Details List !";
    }
    if (empty($listtwo)) {
        $errors['listtwo_er'] = "Insert  About Details List !";
    }
    if (empty($listthree)) {
        $errors['listthree_er'] = "Insert  About Details ListInsert  About Details !";
    }
    if (empty($video_link)) {
        $errors['video_link_er'] = "Insert  About a video link !";
    }
    if ($banner_img['size'] == 0) {
        $errors['banner_img_er'] = "Insert  A About Banner Image !";
    } elseif ($found_img == false) {
        $errors['banner_img_er'] = "Insert  A Proper About Banner Image !";
    }
    if ($tharmnail_img['size'] == 0) {
        $errors['tharmnail_img_er'] = "Insert  A Tharmnail Image !";
    } elseif ($found_img == false) {
        $errors['tharmnail_img_er'] = "Insert  A Proper Tharmnail Image !";
    }

    if (count($errors) > 0) {
        // *error foud
        $_SESSION['errors'] = $errors;
        // print_r($errors);
        header("location: ../backend_files/add_about_section.php");
        $_SESSION['old_data'] = $_POST;
    } else {
        //* no errors
        //* image processing

        $about_banner_img = 'about-banner-' . uniqid() . '.' . $extension;
        $tharmnail_imgtwo = 'tharmail-' . uniqid() . '.' . $extensiontwo;

        move_uploaded_file($banner_img['tmp_name'], "../backend_files/uploads/about_section/about_bannera_img/$about_banner_img");
        move_uploaded_file($tharmnail_img['tmp_name'], "../backend_files/uploads/about_section/tharmnail_img/$tharmnail_imgtwo");

        // print_r($tharmnail_imgtwo);
        $query = "INSERT INTO  about_section ( number ,  about_desone ,  about_destwo ,  listone ,  listtwo ,  listthree ,  video_link ,  banner_img ,  tharmnail_img) VALUES ('$number','$about_desone','$about_destwo','$listone','$listtwo','$listthree','$video_link','$about_banner_img','$tharmnail_imgtwo')";
        $exe = mysqli_query($conn, $query);
        if ($exe) {
            header("location: ../backend_files/add_about_section.php");
            $_SESSION['success'] = " About Section Added Succesfully !";
        }
    }
} else {
    //*fill the form
}
