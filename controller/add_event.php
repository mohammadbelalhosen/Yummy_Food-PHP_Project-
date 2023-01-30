<?php
session_start();
include'../include/env.php';
if (isset($_POST['submit'])) {
    //* variable assigning

    $event_title = $_POST['event_title'];
    $event_des = $_POST['event_des'];
    $event_price = $_POST['event_price'];
    $image = $_FILES['event_img'];
    $extension = pathinfo($image['name'])['extension'];
    $ecepted_files = ['png', 'jpg', 'svg', 'jpeg'];
    $found_img =  in_array($extension, $ecepted_files);

    // print_r($image);
    // exit();


    $errors = [];

    //* validation

    if (empty($event_title)) {
        $errors['event_title_error'] = "Enter Your Event Title !";
    }
    if (empty($event_des)) {
        $errors['event_des_error'] = "Enter Your Event Description !";
    }
    if (empty($event_price)) {
        $errors['event_price_error'] = "Enter Your Event Price !";
    }
    if ($image['size'] == 0) {
        $errors['event_img_error'] = "Enter Your Event Image !";
    } elseif ($found_img == false) {
        $errors['event_img_error'] = "Enter A Perfect Image!";
    }

    if (count($errors) > 0) {
        //*error found
        $_SESSION['errors'] = $errors;
        header("location: ../backend_files/add_event_section.php");
    } else {
        //*error not foung
        $query = "INSERT INTO add_event(event_img, event_title, event_des, event_price) VALUES ('$image','$event_tile','$event_des','$event_price')";
        $ex = mysqli_query($conn,$query);
        if($ex){
            header("location: ../backend_files/add_event_section.php");
        }
    }
}
