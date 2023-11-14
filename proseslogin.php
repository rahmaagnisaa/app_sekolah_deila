<?php
    session_strat();
    include_once('config.php');
    if(isset($_POST['login'])){
        extrart($_POST);
        $user = mysqli_query($conn, "select * from tbuser where username='$username'");
        $data = mysqli_fect_array($user);
        if(password_verify($password,$data['password'])){
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama_user'] = $data['nama_user'];
            $_SESIION['iduser'] = $data['iduser'];
            header('location:index.php');
        }else{
            header('location:login.php');
        }
    }
?>
           