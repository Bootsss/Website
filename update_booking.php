<?php
// Include your database configuration file
include_once "db_config.php"; // Replace with your actual database config file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary form fields are set
    if (
        isset($_POST["bookingID"]) &&
        isset($_POST["room_id"]) &&
        isset($_POST["checkin_date"]) &&
        isset($_POST["checkout_date"]) &&
        isset($_POST["firstname"]) && // Updated field name
        isset($_POST["lastname"]) &&  // New field name
        isset($_POST["contact_number"])
    ) {
        // Sanitize user input to prevent SQL injection
        $bookingId = $_POST["bookingID"];
        $roomId = $_POST["room_id"];
        $checkinDate = $_POST["checkin_date"];
        $checkoutDate = $_POST["checkout_date"];
        $firstName = $_POST["firstname"]; 
        $lastName = $_POST["lastname"];   
        $contactNumber = $_POST["contact_number"];

        echo "POST Data: ";
        print_r($_POST);

        // Connect to the database
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to update the booking
        $query = "UPDATE process_booking SET
             room_id = '$roomId',
             checkin_date = '$checkinDate',
             checkout_date = '$checkoutDate',
             firstname = '$firstName',
             lastname = '$lastName',
             contact_number = '$contactNumber'
             WHERE bookingID = $bookingId";

echo "SQL Query: " . $query;

if ($conn->query($query) === TRUE) {
    if ($conn->affected_rows > 0) {
        echo "Booking updated successfully.";
    } else {
        echo "No rows were updated. It's possible that the bookingID doesn't exist.";
    }
} else {
    echo "Error updating booking: " . $conn->error;
}

        // Close the database connection
        $conn->close();
    } else {
        echo "Incomplete form data submitted.";
    }
} else {
    echo "Invalid request method.";
}
?>
