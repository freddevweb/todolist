<?php

session_start();

require "../models/User.php";

$user = $_SESSION["user"];
$user = new User($_SESSION["user"]->email, $_SESSION["user"]->password, $_SESSION["user"]->name, $_SESSION["user"]->state );
$user->logout();

// session_destroy();

header("location:../index.php?page=connection");
