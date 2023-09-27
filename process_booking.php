<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database configuration file
include "db_config.php";

// Establish a MySQLi connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch room data
$roomdata_query = "SELECT * FROM room";
$roomdata_result = mysqli_query($conn, $roomdata_query);

// Check if the query was successful
if ($roomdata_result) {
    $roomdata = mysqli_fetch_all($roomdata_result, MYSQLI_ASSOC);
} else {
    echo "Error fetching room data: " . mysqli_error($conn);
}

// Handle form submission
if (isset($_POST["submit"])) {
    // Extract and sanitize form data
    $checkin_date = strtotime($_POST["checkin"]); // Convert date to Unix timestamp
    $checkout_date = strtotime($_POST["checkout"]); // Convert date to Unix timestamp
    $contact_number = $_POST["contactnumber"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $room_id = $_POST["roomID"]; // This is the selected room ID

    // Validate and sanitize the room_id value
    if (!is_numeric($room_id)) {
        // Handle invalid room_id, e.g., redirect back with an error message
        header("Location: BookingsMake.html?message=error");
        exit();
    }

    // Insert booking data into the database
    $sql = "INSERT INTO process_booking (checkin_date, checkout_date, firstname, lastname, contact_number, room_id)
        VALUES ('$checkin_date', '$checkout_date', '$firstName', '$lastName', '$contact_number', '$room_id')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to booking page with success message
        header("Location: BookingsMake.html?message=success");
        exit(); // Stop script execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Close the database connection
$conn->close();
?>
