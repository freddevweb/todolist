<?php

function connect(){
    $pdo = new PDO('mysql:host=localhost:8889;dbname=todolist;charset=utf8', 'root', 'root');
    $pdo->query("todolist");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

    return $pdo;
}

class User {

    public $id;
    public $username;
    public $email;
    private $password;
    public $state;
    
    public function __construct($email, $password, $username = "", $state){

        $this->email = $email;
        $this->password = sha1($password);
        $this->username = $username;
        $this->state = $state;

    }

    private function emailExist(){

        // verifier l'existance de l'email dans la DB
        $pdo = connect();
        $prepared = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $prepared->execute(array(
            'email' => $this->email
        ));

        $bddUser = $prepared->fetch(PDO::FETCH_ASSOC);

        if( $bddUser ){

            return $bddUser;

        }
        else {

            return false;

        }
    }

    public function signIn (){

        if($this->emailExist()){

            echo "<p> cet email est deja utilise </p>";
            return FALSE; // coupe la fonction

        }

        // envoyer dans la DB le nouvel utilisateur
        $pdo = connect();
        
        $prepared = $pdo->prepare("INSERT INTO user SET email = :email, pass = :pass, username = :username, state = :state");
        $prepared->execute(array(
            'email' => $this->email,
            'pass' => $this->password,
            'username' => $this->username,
            'state'=> $this->state

        ));
        
        // recuperer le $this->id
        $this->id = $pdo->lastInsertId();

        return TRUE;
    }

    public function logIn (){

        // verifie si l'utilisateur existe et si le mot de passe correspond
    $userBdd = $this->emailExist();

    if ( $userBdd ){

        if( $userBdd["pass"] == $this->password ){
            
            $this->id = $userBdd["id"]; // ou crate id
            $this->username = $userBdd["username"];
            // var_dump($this);
            $this->state = $userBdd["state"];
            $_SESSION["user"] = $this;
            
            return true;
        }
        else{
            return false;
        }
    }

    // creer la session et le SESSION ID

    }

    public function logOut (){
        //coupe la sesstion
        if (isset($_SESSION)){

            session_destroy();
        }

    }

    public function getNotes(){

        $pdo = connect();

        $prepared = $pdo->prepare("SELECT * FROM note WHERE user_id = :id");
        $prepared->execute(array(
            'id' => $this->id
        ));
        $result = $prepared->fetchAll(PDO::FETCH_ASSOC);

        $notes = array();
        foreach( $result as $result){
            $user_id = $result["user_id"];
            $titre = $result["titre"];
            $description = $result["descrip"];

            $note = new Note($user_id, $titre, $description );

            $note->id = $result["id"];

            array_push ( $notes, $note );//pousser dans le tableau
        }
        return $notes;

    }

    public function getUsers(){

        $pdo = connect();

        $prepared = $pdo->prepare("SELECT * FROM user");
        $prepared->execute();
        $resultat = $prepared->fetchAll(PDO::FETCH_ASSOC);

        $users = array();

        foreach( $resultat as $result){
            $id = $result["id"];
            $email = $result["email"];
            $password = $result["password"];
            $username = $result["username"];
            $state = $result["state"];
            
            $user = new User($email, $password, $username, $state);


            array_push ( $users, $user );//pousser dans le tableau
        }
        
        return $users;

    }

    public function getById(){
        $pdo = connect();
        $prepared = $pdo->prepare("SELECT * FROM user WHERE id = :id");
        $prepared->execute(array(
            'id' => $this->id
        ));

        $result = $prepared->fetch(PDO::FETCH_ASSOC);
        $this->id = $result["id"];
        $this->username = $result["username"];
        $this->email = $result["email"];
        $this->state = $result["state"];

    }


}

