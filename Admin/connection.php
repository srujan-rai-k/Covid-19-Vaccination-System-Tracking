<?php
        $port = $_SERVER["WEBSITE_MYSQL_PORT"];
        $server = "localhost:$port";
        $user = "azure";
        $password = "6#vWHD_$";
        $db = "localdb";

        $conn = mysqli_connect($server, $user, $password, $db);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
?>
