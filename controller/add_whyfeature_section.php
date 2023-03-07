<?php
session_start();
include '../include/env.php';
if (isset($_POST['submit'])) {
    //* some action
    //*assigning all request
    $white_card_icon = $_POST['white_card_icon'];
    $white_card_title = $_POST['white_card_title'];
    $white_card_des = $_POST['white_card_des'];
    // print_r($extention);
    // exit;

    //* validation
    $errors = [];
    if (empty($white_card_icon)) {
        $errors['white_card_icon_er'] = "Insert Fontawesome Icon Name!";
    }
    if (empty($white_card_title)) {
        $errors['white_card_title_er'] = "Insert White Card Title !";
    }
    if (empty($white_card_des)) {
        $errors['white_card_des_er'] = "Insert White Card Description !";
    }


    if (count($errors) > 0) {
        //*error foud
        $_SESSION['errors'] = $errors;

        header("location: ../backend_files/add_whyfeature_section.php");
    } else {
        //* no errors
        $query = "INSERT INTO  feature_section (white_card_icon ,  white_card_title ,  white_card_des ) VALUES ('$white_card_icon','$white_card_title','$white_card_des')";
        $exe = mysqli_query($conn, $query);
        if ($exe) {
            header("location: ../backend_files/add_whyfeature_section.php");
            $_SESSION['success'] = " Feature Added Succesfully !";
        }
    }
} else {
    //*fill the form
}
