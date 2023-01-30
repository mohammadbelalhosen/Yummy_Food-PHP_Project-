<?php
session_start();
include '../include/env.php';

if(isset($_POST['submit'])){
    //* assinging all request
    $catagory = $_POST['catagory'];
    $error = [];

    //*validation
    if(empty($catagory)){
        $error['catagory'] ='Plz Enter a Catagory';
    }

    if(count($error) > 0){
        // print_r('eroor');
        header("Location: ../backend_files/add_catagory_section.php");
        $_SESSION['error_catagory'] = $error;
    }else{
        $insert = "INSERT INTO catagories (catagory) VALUES ('$catagory')";
        $data = mysqli_query($conn,$insert);
        header("Location: ../backend_files/add_catagory_section.php");
        
    }



}

