<?php
session_start();
include '../include/env.php';
$id = $_GET['id'];
$delete = "DELETE FROM message WHERE id=$id";
$exe = mysqli_query($conn, $delete);
header("Location: ../backend_files/all_messages.php");
$_SESSION['success'] = "Message Deleted Successfully !";
