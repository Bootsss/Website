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

        // Display booking details
        echo "<h1>Booking Details</h1>";
        echo "<p><strong>Booking ID:</strong> " . $booking["bookingID"] . "</p>";
        echo "<p><strong>Room ID:</strong> " . $booking["room_id"] . "</p>";
        echo "<p><strong>Check-in Date:</strong> " . $booking["checkin_date"] . "</p>";
        echo "<p><strong>Checkout Date:</strong> " . $booking["checkout_date"] . "</p>";
        echo "<p><strong>Customer Name:</strong> " . $booking["customer_name"] . "</p>";
        echo "<p><strong>Contact Number:</strong> " . $booking["contact_number"] . "</p>";

        echo "<p><a href='edit_booking.php?id=" . $bookingId . "'>Edit Booking</a> | <a href='delete_booking.php?id=" . $bookingId . "'>Delete Booking</a></p>";
    } else {
        echo "Booking not found.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Booking ID not provided.";
}
?>
