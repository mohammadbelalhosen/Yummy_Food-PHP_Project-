<?php
session_start();
include '../include/env.php';

if (isset($_POST['login'])) {
    //* when click login button then action some works
    $log_email = $_POST['email'];
    $log_pass = $_POST['pass'];

    $password_encry = sha1($log_pass);

    //*validation
    $errors = [];
    if (empty($log_email)) {
        $errors['log_email'] = "Enter Your Email Address !";
    }

    if (empty($log_pass)) {
        $errors['log_pass'] = "Enter Your Password !";
    }

    if (count($errors) > 0) {
        //* show error and redirect page

        header('location: ../backend_files/login.php');
        $_SESSION['errors'] = $errors;
        $_SESSION['oldValue'] = $_POST;
    } else {
        //*nothing error and check email

        $query = "SELECT * FROM register_user WHERE email = '$log_email'";
        $store = mysqli_query($conn, $query);

        if (mysqli_num_rows($store) == 0) {
            //email not found
            $_SESSION['errors']['log_email'] = "Email Not Found ! !";
            header("location: ../backend_files/login.php");
        } else {
            //email foud
            $query2 = "SELECT * FROM register_user WHERE email = '$log_email' && pass = '$password_encry'";
            $stor2 = mysqli_query($conn, $query2);
            $fetch_data = mysqli_fetch_assoc($stor2);
            if (mysqli_num_rows($stor2) == 0) {
                //password incorrect
                $_SESSION['errors']['log_pass'] = "Incorrect Your Password !";
                header("location: ../backend_files/login.php");

                $_SESSION['oldValue'] = $_POST;
            } else {
                //when pass and email is correct then go to dashboard
                header("location:../backend_files/dashboard.php");
                $_SESSION['auth'] = $fetch_data;
                
            }
        }
    }
} else {
    //* if anybody login another way to login page so show this massage

    echo "plz login first";
}
