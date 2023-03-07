<?php
session_start();
$id = $_GET['id'];
include '../include/env.php';
$qury = "SELECT * FROM contact_section WHERE id=$id";
$ex = mysqli_query($conn, $qury);
$fetch = mysqli_fetch_assoc($ex);



$qu = "DELETE FROM contact_section WHERE id=$id";
$e = mysqli_query($conn, $qu);

header("Location: ../backend_files/all_contact_section.php");
$_SESSION['success'] = "Contact Deleted Successfully !";
