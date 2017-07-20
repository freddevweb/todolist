<?php

class Note {

    public $id;
    public $user_id;
    public $titre;
    public $description;

    // on peut faire un constructeur avec un id et faire appel a getbyid pour implémenter le constructeur
    // donc il faut définir chaque truc du constructeur avec l'id au départ
    
    public function __construct( $user_id, $titre, $description){
        $this->user_id = $user_id;
        $this->titre = $titre;
        $this->description = $description;
    }

    public static function blank(){
        return new Note(0);
    }

    public function getById(){
        $pdo = connect();
        $prepared = $pdo->prepare("SELECT * FROM note WHERE id = :id");
        $prepared->execute(array(
            'id' => $this->id
        ));

        $result = $prepared->fetch(PDO::FETCH_ASSOC);
        $this->user_id = $result["user_id"];
        $this->titre = $result["titre"];
        $this->description = $result["descrip"];


    }

    public function create(){

        $pdo = connect();
        $prepared = $pdo->prepare("INSERT INTO note SET user_id = :user_id, titre = :titre, descrip = :descrip");
        $prepared->execute(array(
            'user_id' => $this->user_id,
            'titre' => $this->titre,
            'descrip' => $this->description
        ));

        // recupérer le $this id
        $this->id = $pdo->lastInsertId();

    }

    public function modify (){

        $pdo = connect();
        $prepared = $pdo->prepare("UPDATE note SET titre = :titre, descrip = :descrip WHERE id = :id");
        $prepared->execute(array(
            'id' => $this->id,
            'titre' => $this->titre,
            'descrip' => $this->description
        ));

        $this->id = $pdo->lastInsertId();
    }

    public function delete (){

        $pdo = connect();
        $prepared = $pdo->prepare("DELETE FROM note WHERE id = :id");
        $prepared->execute(array(
            'id' => $this->id
        ));

    }
}