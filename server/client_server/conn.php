<?php
        $dbHost = 'localhost';
        $dbName = 'u907822938_alumnidb';
        $dbUsername = 'root';
        $dbPassword = '';
        $connection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName) ;
        
        if (!$connection) {
            die("Can't connect to the database server. Error: " . mysqli_connect_error());
        }
?>