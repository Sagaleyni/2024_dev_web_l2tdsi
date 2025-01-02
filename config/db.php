<?php
$bdd = 'mysql:host=localhost;dbname=db_dev_web_l2tdsi';
$username= 'root'; 
$password = '';

try {
    $connexion = new PDO($bdd, $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    


   //echo "Connexion réussie à la base de données";//
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    
}

?>