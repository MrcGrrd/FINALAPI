<?php
// Assuming you have a database connection established
$servername = "NAYSA-GERARD";
$username = "NAYSACon";
$password = "P@ssw0rd";
$dbname = "Anywhere1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $type = $conn->real_escape_string($_POST['type']);
    $user_id = $conn->real_escape_string($_POST['user_id']);
    $password = $conn->real_escape_string($_POST['password']);
    $public_key = $conn->real_escape_string($_POST['public_key']);
    $private_key = $conn->real_escape_string($_POST['private_key']);
    $auth = $conn->real_escape_string($_POST['auth']);
    $issuance = $conn->real_escape_string($_POST['issuance']);
    $inquiry = $conn->real_escape_string($_POST['inquiry']);
    $uri_auth = $conn->real_escape_string($_POST['uri_auth']);
    $uri_issuance = $conn->real_escape_string($_POST['uri_issuance']);
    $uri_inquiry = $conn->real_escape_string($_POST['uri_inquiry']);

    // SQL query to insert data into database
    $sql = "INSERT INTO settings (name, type, user_id, password, public_key, private_key, auth, issuance, inquiry, uri_auth, uri_issuance, uri_inquiry)
            VALUES ('$name', '$type', '$user_id', '$password', '$public_key', '$private_key', '$auth', '$issuance', '$inquiry', '$uri_auth', '$uri_issuance', '$uri_inquiry')";

    if ($conn->query($sql) === TRUE) {
        echo "Settings saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
