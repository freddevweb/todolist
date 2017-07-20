<?php

require "../models/User.php";

if( !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["pseudo"]) ){
    
    if( strlen($_POST["email"]) == 0 && strlen($_POST["password"]) ){
        header("location:../index.php?page=inscription&message='champs incomplets'");
    }
    else {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $username = $_POST["pseudo"];
        $state = 0;

        $user = new User($email, $pass, $username, $state);

        $inscriptionSuccess = $user->signIn();

        if ($inscriptionSuccess) {

            header("location:../index.php?page=connection");

        }
        else {

            header("location:../index.php?page=inscription&message='Cet email existe déjà!'");
        }

    }

}
else {
    header("location:../index.php?page=inscription&message='champs incomplets'");
}