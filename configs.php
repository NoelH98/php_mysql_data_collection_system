<?php  

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "clientsdirectory";
        
        // Create connection
        $dbconnection = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($dbconnection->connect_error) {
            die("Connection failed: " . $dbconnection->connect_error);
        } 
        
?>