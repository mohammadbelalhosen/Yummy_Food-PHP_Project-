<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
    //* some action
    //*assigning all request
    $red_card_des = $_POST['red_card_des'];
    // print_r($extention);
    // exit;

    //* validation
    $errors = [];
    if (empty($red_card_des)) {
        $errors['red_card_des_er'] = "Insert Red Card Description !";
    }

    if (count($errors) > 0) {
        //*error foud
        $_SESSION['errors'] = $errors;

        header("location: ../backend_files/add_why_section.php");
    } else {
        //* no errors
        $query = "INSERT INTO  why_section ( red_card_des ) VALUES ('$red_card_des')";
        $exe = mysqli_query($conn, $query);
        if ($exe) {
            header("location: ../backend_files/add_why_section.php");
            $_SESSION['success'] = " Why Card Added Succesfully !";
        }
    }
} else {
    //*fill the form
}
