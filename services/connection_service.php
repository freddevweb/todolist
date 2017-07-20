<?php
session_start();

require "../models/User.php";

if( isset($_POST["pass"]) && isset($_POST["email"]) ){

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $user = new User($email, $pass, "", "" );

    $logged = $user->logIn();

    if ($logged) {

        header("location:../index.php?page=profil");
        
    }
    else {

        header("location:../index.php?page=inscription&message='impossible de se connecter'");
    }
}




