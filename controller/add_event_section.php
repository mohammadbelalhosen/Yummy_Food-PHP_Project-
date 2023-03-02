<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
    //* some action

    //*assigning all request

    $event_title = $_POST['event_title'];
    $event_des = $_POST['event_des'];
    $event_price = $_POST['event_price'];
    $event_img = $_FILES['event_img'];
    $extension = pathinfo($event_img['name'])['extension'];
    $ecepted_files = ['png', 'jpg', 'svg', 'JPG', 'jpeg'];
    $found_img =  in_array($extension, $ecepted_files);
    //   print_r($_POST);
    //   exit;

    //* validation
    $errors = [];
    if (empty($event_title)) {
        $errors['event_title_er'] = "Insert  Event Title !";
    }
    if (empty($event_des)) {
        $errors['event_des_er'] = "Insert  Event Description !";
    }
    if (empty($event_price)) {
        $errors['event_price_er'] = "Insert  Event Price !";
    }
    if ($event_img['size'] == 0) {
        $errors['event_img_er'] = "Insert  A Event Image !";
    } elseif ($found_img == false) {
        $errors['event_img_er'] = "Insert  A Proper Event Image !";
    }

    if (count($errors) > 0) {
        //*error foud
        $_SESSION['errors'] = $errors;
        // print_r($errors);
        header("location: ../backend_files/add_event_section.php");
    } else {
        //* no errors
        //* image processing

        $image_name = 'event-' . uniqid() . '.' . $extension;

        move_uploaded_file($event_img['tmp_name'], "../backend_files/uploads/event_section/$image_name");

        // print_r($banner_img);
        $query = "INSERT INTO  event_section (event_title ,  event_des ,  event_price ,  event_img) VALUES ('$event_title','$event_des','$event_price','$image_name')";
        $exe = mysqli_query($conn, $query);
        if ($exe) {
            header("location: ../backend_files/add_event_section.php");
            $_SESSION['success'] = " Event Added Succesfully !";
        }
    }
} else {
    //*fill the form
}
