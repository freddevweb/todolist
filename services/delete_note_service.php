<?php

require "../models/Note.php";
require "../models/User.php";

session_start();

$note = new Note("", "", "");
$note->id = $_GET["id"];
$note->delete();


header("location:../index.php?page=profil");