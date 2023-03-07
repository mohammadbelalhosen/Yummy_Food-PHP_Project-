<?php
session_start();
include '../include/env.php';
$id = $_GET['id'];

// fetch email 

$select_email = "SELECT email FROM table_book_orders WHERE id = $id";
$datass = mysqli_query($conn, $select_email);
$resultss = mysqli_fetch_assoc($datass);

// $email_e = $resultss['email'];


// fetch other sec 

$select_other = "SELECT * FROM other_section";
$datass = mysqli_query($conn, $select_other);
$other = mysqli_fetch_assoc($datass);



$delete = "DELETE FROM table_book_orders WHERE id=$id";
$exe = mysqli_query($conn, $delete);

if ($exe) {
    if (isset($_POST['submit'])) {
        // another part send email 
        
        $url = $other['url'];
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POSTFIELDS => http_build_query([
                "recipient" => $_POST['email'],
                "subject"   => $_POST['subject'],
                "body"      => $_POST['body']
                ])
            ]);
            $result = curl_exec($ch);

            $_SESSION['email_e'] = $resultss['email'];
        }
        header("Location: ../backend_files/table_book_order.php?id=$id");


    $_SESSION['success'] = "Table Order Cancel Successfully !";
}
