<?php

require "../models/functions.php";
require "../models/User.php";
require "../models/Note.php";

session_start();

readMessage();

$admin = $_SESSION["user"];

switch ( readPageAdmin() ){
    case "admin_profile_content" :
        
        $user = new User("", "", "", "");
        $user->id = $_GET["userId"];
        $user->getById();
        
        $notes = $user->getNotes();
        include "admin/admin_profile_content.php";
        break;
    case "admin_profiles" :
        $users = $admin->getUsers();
        include "admin/admin_profiles.php";
        break;
}