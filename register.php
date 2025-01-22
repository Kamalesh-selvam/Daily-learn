<?php
// Database connection details
$host = "localhost";    // Server name
$username = "root";     // Database username
$password = "kamal975"; // Database password
$dbname = "gym_db";     // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $aadhaar = $_POST['aadhaar'];

    // Insert data into the database
    $sql = "INSERT INTO gym_members (name, dob, email, phone, aadhaar)
            VALUES ('$name', '$dob', '$email', '$phone', '$aadhaar')";

    try {
        if ($conn->query($sql) === TRUE) {
            // Redirect to the success page
            header("Location: success.php");
            exit();
        } else {
            throw new Exception($conn->error);
        }
    } catch (mysqli_sql_exception $e) {
        // Check if the error is due to duplicate entry
        if (str_contains($e->getMessage(), 'Duplicate entry')) {
            header("Location: error.php?message=Aadhaar%20number%20already%20exists");
            exit();
        } else {
            echo "An unexpected error occurred: " . $e->getMessage();
        }
    }
    $conn->close();
}
?>
