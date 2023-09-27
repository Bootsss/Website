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

    // Query to retrieve booking details by ID
    $query = "SELECT * FROM process_booking WHERE bookingID = $bookingId";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $booking = $result->fetch_assoc();

        // Display a form to edit booking details
        echo "<h1>Edit Booking</h1>";
        echo "<form action='update_booking.php' method='POST'>";
        echo "<input type='hidden' name='bookingID' value='" . $booking["bookingID"] . "'>";
        echo "Room ID: <input type='text' name='room_id' value='" . $booking["room_id"] . "'><br>";
        echo "Check-in Date: <input type='date' name='checkin_date' value='" . $booking["checkin_date"] . "'><br>";
        echo "Checkout Date: <input type='date' name='checkout_date' value='" . $booking["checkout_date"] . "'><br>";
        echo "First Name: <input type='text' name='firstname' value='" . $booking["firstname"] . "'><br>";
        echo "Last Name: <input type='text' name='lastname' value='" . $booking["lastname"] . "'><br>";
        echo "Contact Number: <input type='text' name='contact_number' value='" . $booking["contact_number"] . "'><br>";
        echo "<input type='submit' name='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "Booking not found.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Booking ID not provided.";
}
?>
