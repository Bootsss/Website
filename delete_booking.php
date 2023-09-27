<?php
// Include your database configuration file
include_once "db_config.php"; // Replace with your actual database config file

// Check if a booking ID is provided in the URL
if (isset($_GET["id"])) {
    $bookingId = $_GET["id"];

    // Connect to the database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to delete the booking by ID
    $query = "DELETE FROM process_booking WHERE bookingID = $bookingId";

    if ($conn->query($query) === TRUE) {
        echo "Booking deleted successfully.";
    } else {
        echo "Error deleting booking: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Booking ID not provided.";
}
?>
