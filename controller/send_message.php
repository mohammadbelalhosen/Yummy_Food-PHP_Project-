<?php
session_start();
include '../include/env.php';

if (isset($_POST['submit'])) {
    //*assingning requst
    $message_name = $_POST['message_name'];
    $message_email = $_POST['message_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $errors = [];

    //*error
    if (empty($message_name)) {
        $errors['message_name_error'] = "Please Enter Your Name";
    }
    if (empty($message_email)) {
        $errors['message_email_error'] = "Please Enter Your Email";
    }
    if (empty($subject)) {
        $errors['subject_error'] = "Please Enter Your Subject";
    }
    if (empty($message)) {
        $errors['message_error'] = "Please Enter Message";
    }


    if (count($errors) > 0) {

        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $_POST;
        header("Location: ../index.php#send-message");
    } else {

        $insert = "INSERT INTO  message ( name ,  email ,  subject ,  message ) VALUES ('$name','$email','$subject','$message')";
        $data = mysqli_query($conn, $insert);
        $_SESSION['message_success'] = "Your message has been sent. Thank you!";
        if ($data) {
            header("Location: ../index.php#send-message");
        }
        // print_r($_POST);
    }
} else {
    //*error
    echo 'Enter All Details and Submit Please';
}
