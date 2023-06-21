<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_soccer";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $base_url = "http://localhost:8080/travel/site/"; 
?>