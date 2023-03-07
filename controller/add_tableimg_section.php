<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
    //* some action

    //*assigning all request

    $table_image = $_FILES['table_image'];
    $extension = pathinfo($table_image['name'])['extension'];
    $ecepted_files = ['png', 'jpg', 'svg', 'JPG', 'jpeg'];
    $found_img =  in_array($extension, $ecepted_files);
    // print_r($extention);
    // exit;

    //* validation
    $errors = [];
    if ($table_image['size'] == 0) {
        $errors['table_image_er'] = "Insert  A  Image !";
    } elseif ($found_img == false) {
        $errors['table_image_er'] = "Insert  A Proper  Image !";
    }

    if (count($errors) > 0) {
        //*error foud
        $_SESSION['errors'] = $errors;
        // print_r($errors);
        header("location: ../backend_files/add_tableimg_section.php");
    } else {
        //* no errors
        //* image processing

        $image_name = 'banner-' . uniqid() . '.' . $extension;

        move_uploaded_file($table_image['tmp_name'], "../backend_files/uploads/tableimg_section/$image_name");

        // print_r($banner_img);
        $query = "INSERT INTO  tableimg_section (table_image) VALUES ('$image_name')";
        $exe = mysqli_query($conn, $query);
        if ($exe) {
            header("location: ../backend_files/add_tableimg_section.php");
            $_SESSION['success'] = " Table & Counter Image Added Succesfully !";
        }
    }
} else {
    //*fill the form
}
