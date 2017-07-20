<?php

require "../models/Note.php";
require "../models/User.php";

session_start();

if( !empty($_POST["titre"]) && !empty($_POST["description"]) ){
    
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    
    $user = $_SESSION["user"]; 

    $note = new Note($user->id, $titre, $description);

    $note->create();

    header("location:../index.php?page=profil");
}
else {
    header("location:../index.php?page=profil&message='champs incomplets'");
}

