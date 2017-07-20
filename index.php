<?php
require "models/functions.php";
require "models/User.php";
require "models/Note.php";

session_start();

readMessage();



    switch ( readPage() ){
        case "connection" :
            include "views/connection.php";
            break;
        case "profil" :
            $user = $_SESSION["user"];
            $state = $user->state;
            
            if($state === 1){
                header("location:views/profil_admin.php?pageAdmin=admin_profiles");
            }
            else if ($state === 0){
                $notes = $user->getNotes();
                if ( isset($_GET["id"]) ){
                    $note = new Note("", "", "");
                    $note->id = $_GET["id"];
                    $note->getById();
                    $form = "update";
                }
                else{
                    $form = "insert";
                }
                include "views/profil.php";
            }
            break;
        case "modify_note" :
            include "views/modify_note.php";
            break;
        case "inscription" :
            include "views/inscription.php";
            break;
        default :
            include "views/connection.php";
            break;
    }




?>