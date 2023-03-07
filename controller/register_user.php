<?php
include '../include/env.php';
session_start();

if (isset($_POST['submit'])) {
    //* kinds of action 

    //* all reqest are assigning 
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['con_pass'];

    $password = sha1($pass);

    //* assigning a array for all errors
    $errors = [];

    if (empty($fName)) {
        $errors['fName'] = "Enter Your First Name !";
    }
    if (empty($lName)) {
        $errors['lName'] = "Enter Your Last Name !";
    }
    if (empty($email)) {
        $errors['email'] = "Enter Your Email Address !";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Enter Your valid Email Address !";
    }

    //* we use this way to valided email
    // elseif(strpos($email, "@") == 0 ){
    //     $errors['email']="Enter Your valid Email Address !"; 
    // }

    if (empty($pass)) {
        $errors['pass'] = "Enter Your Password !";
    }
    if (empty($con_pass)) {
        $errors['con_pass'] = "Enter Your Conferm Password !";
    } elseif ($pass !== $con_pass) {
        $errors['con_pass'] = "Conferm Password Didn't Match !"; // showing error for con pass not match
    }


    if (count($errors) > 0) {
        //show errors and redirect page
        header("location: ../backend_files/register.php");
        $_SESSION['errors'] = $errors;
        $_SESSION['oldValue'] = $_POST;
    } else {
        //submit form details in database
        // echo "hlw";
        // print_r($password);

        $query = "INSERT INTO register_user( fName, lName, email, pass) VALUES ('$fName','$lName','$email','$password')";
        $store = mysqli_query($conn, $query);
        if ($store) {
            $_SESSION['success'] = "Your Details have been Submitted !";
            header('location: ../backend_files/login.php');
        }
    }
} else {
    //*plz register the form 
    echo "plz fill the form ";
}
