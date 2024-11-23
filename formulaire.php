<?php
    $serveur = "localhost";
    $dbname = "quizz";
    $user = "laurent";
    $pass = "12345";
    
    $pseudo = $_POST["pseudo"];
                
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO user(username)
            VALUES(:pseudo, :mdp)");
        $sth->bindParam(':pseudo',$pseudo);
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:quizz.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>