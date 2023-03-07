<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
    //* some action

    //*assigning all request

    $counter = $_POST['counter'];
    $counter_name = $_POST['counter_name'];
  
    //* validation
    $errors = [];
    if (empty($counter)) {
        $errors['counter_er'] = "Insert  A Number !";
    }
    if (empty($counter_name)) {
        $errors['counter_name_er'] = "Insert  Counter Name !";
    }

    
    if (count($errors) > 0) {
        // *error foud
        $_SESSION['errors'] = $errors;   
        header("location: ../backend_files/add_Counter_section.php");
      
    } else {
    $query = "INSERT INTO  counter_section (counter ,  counter_name ) VALUES ('$counter','$counter_name')";
    $exe = mysqli_query($conn, $query);
    if ($exe) {
        header("location: ../backend_files/add_counter_section.php");
        $_SESSION['success'] = " Counter  Added Succesfully !";
    }
}
} else {
    //*fill the form
}
