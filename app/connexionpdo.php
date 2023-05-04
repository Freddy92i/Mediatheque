<?php
	try
    {
        // On se connecte à la base de donnée inscription avec le compte
        // serveur
         $bdd= new PDO('mysql:host=localhost;dbname=pfreddy','pfreddy','SLAM_pfreddy&2023',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        // Local
        //  $bdd= new PDO('mysql:host=localhost;dbname=mediatheque_numerique','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>
