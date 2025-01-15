<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from POST request
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection details
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "kamal975"; // Update to your actual database password
    $dbname = "web";

    // Establish database connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM kamal WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows === 1) {
        // Login success
        header("Location: success.html");
        exit();
    } else {
        // Login failed
        header("Location: error.html");
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
