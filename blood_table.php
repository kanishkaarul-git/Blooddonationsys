<?php
$conn = mysqli_connect("localhost", "root", "", "blood_donation");

$sql = "CREATE TABLE donor (
    name VARCHAR(100),
    email VARCHAR(100),
    location VARCHAR(100),
    blood_type VARCHAR(10)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
