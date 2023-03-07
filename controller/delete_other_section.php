
<?php
session_start();
$id = $_GET['id'];
include '../include/env.php';
$qury = "SELECT * FROM other_section WHERE id=$id";
$ex = mysqli_query($conn, $qury);
$fetch = mysqli_fetch_assoc($ex);


$qu = "DELETE FROM other_section WHERE id=$id";
$e = mysqli_query($conn, $qu);
$_SESSION['success'] = "Other Item Deleted Successfully !";

header("Location: ../backend_files/all_other_section.php");
