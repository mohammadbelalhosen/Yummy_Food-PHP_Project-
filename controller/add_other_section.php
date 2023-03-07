<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
    //* some action

    //*assigning all request
    $url = $_POST['url'];
    $r_name = $_POST['r_name'];

    //* validation

    $query = "INSERT INTO  other_section ( url ,  r_name ) VALUES ('$url','$r_name')";
    $exe = mysqli_query($conn, $query);
    if ($exe) {
        header("location: ../backend_files/add_other_section.php");
        $_SESSION['success'] = " Other Item  Added Succesfully !";
    }
} else {
    //*fill the form
}
