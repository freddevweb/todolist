<?php

require "../models/Note.php";
require "../models/User.php";

session_start();

$user = $_SESSION["user"];

    if ( !empty($_POST["id"]) && !empty($_POST["titre"]) && !empty($_POST["description"]) ){

        $note = new Note($user->id, $_POST["titre"], $_POST["description"]);
        $note->id = $_POST["id"];
        $note->modify();

        $link = "location:../index.php?page=profil";
    }
    else {
        $link = "location:../index.php?page=profil";
    }

header($link);







    