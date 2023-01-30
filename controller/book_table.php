<?php

if(isset($_POST['submit'])){
    //*assingning requst
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];
    $message = $_POST['message'];

    $errors = [];

    print_r($people);
}