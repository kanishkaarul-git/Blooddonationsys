<?php

        // servername => localhost
        // username => root
        // password => empty
        // database name => blood_donation
        $conn = mysqli_connect("localhost", "root", "", "");
        
        // Check connection
        if($conn == false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
       $sql = "CREATE DATABASE blood_donation";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully!";
} else {
    echo "ERROR: Could not create database. " . mysqli_error($conn);
}

//  Close connection
mysqli_close($conn);
?>