<?php
session_start();
include '../include/env.php';

if (isset($_POST['submit'])) {
    //*assingning requst
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $total_people = $_POST['total_people'];
    $message = $_POST['message'];

    $errors = [];

    //*error
    if (empty($name)) {
        $errors['name_error'] = "Please Enter Your Name";
    }
    if (empty($email)) {
        $errors['email_error'] = "Please Enter Your Email";
    }
    if (empty($phone)) {
        $errors['phone_error'] = "Please Enter Your Phone";
    }
    if (empty($date)) {
        $errors['date_error'] = "Please Enter Date";
    }
    if (empty($time)) {
        $errors['time_error'] = "Please Enter Time";
    }
    if (empty($total_people)) {
        $errors['total_people_error'] = "Please Enter Total People";
    }
    if (empty($message)) {
        $errors['message_error'] = "Please Enter Messege";
    }

    if (count($errors) > 0) {

        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $_POST;
        header("Location: ../index.php#book-a-table");
    } else {

        $insert = "INSERT INTO table_book_orders (name, email, phone, date, time, total_people, message) VALUES ('$name','$email','$phone','$date','$time','$total_people','$message')";
        $data = mysqli_query($conn, $insert);
        $_SESSION['success']= "Your Table is Booked Successfully";
        if ($data) {
            header("Location: ../index.php#book-a-table");
        }
        // print_r($_POST);
    }

} else {
    //*error
    echo 'Enter All Details and Submit Please';
}
