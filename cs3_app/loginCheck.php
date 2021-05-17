<?php
    include 'connection.php';
    $uname = mysqli_real_escape_string($db->connect,$_POST['username']);
    $pass = mysqli_real_escape_string($db->connect,$_POST['password']);
    $success = $db->data_print("select *from login where username = '$uname' and password ='".md5($pass)."'");
    $user = mysqli_fetch_assoc($success);

    $uname = $db->createSession ($user['username']);
    if(isset($uname)){
        header('Location: index.php');
    }else{
        header('Location: login.php');
    }
    ?>