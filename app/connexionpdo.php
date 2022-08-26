<?php
	try
    {
        // On se connecte à la base de donnée inscription avec le compte
        // serveur
        // $bdd= new PDO('mysql:host=localhost;dbname=mediatheque','pfreddy','aden_pfreddy$2022',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        // Local
         $bdd= new PDO('mysql:host=localhost;dbname=mediatheque','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>
