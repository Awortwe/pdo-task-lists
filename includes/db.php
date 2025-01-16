<?php 
    $dsn = "mysql:host=localhost;dbname=projecttwo";

    try
    {
        $pdo = new PDO($dsn, 'root', '');
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>