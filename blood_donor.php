<?php
$conn = mysqli_connect("localhost", "root", "", "blood_donation");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* INSERT DATA */
if (isset($_POST['register'])) {

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $location = $_POST['location'];
    $blood    = $_POST['bloodType'];

    $sql = "INSERT INTO donor (name, email, location, blood_type)
            VALUES ('$name', '$email', '$location', '$blood')";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>Donor registered successfully!</h3>";
    } else {
        echo "ERROR: " . mysqli_error($conn);
    }
}

/* SEARCH DATA */
if (isset($_GET['search'])) {

    $searchBlood = $_GET['searchType'];
    $searchLoc   = $_GET['searchLocation'];

    $sql = "SELECT * FROM donor WHERE 1";

    if (!empty($searchBlood)) {
        $sql .= " AND blood_type='$searchBlood'";
    }

    if (!empty($searchLoc)) {
        $sql .= " AND location LIKE '%$searchLoc%'";
    }

    $result = mysqli_query($conn, $sql);

    echo "<h2>Available Donors</h2>";
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Blood Type</th>
            </tr>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['location']."</td>
                    <td>".$row['blood_type']."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No donors found</td></tr>";
    }

    echo "</table>";
}

mysqli_close($conn);
?>
