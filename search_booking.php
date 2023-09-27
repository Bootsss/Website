<?php
// Include your database configuration file
include_once "db_config.php"; // Replace with your actual database config file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary form field is set
    if (isset($_POST["bookingID"])) {
        // Sanitize user input to prevent SQL injection
        $bookingId = $_POST["bookingID"];

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

            // Display the booking details
            echo "<h2>Booking Details</h2>";
            echo "<p><strong>Booking ID:</strong> " . $booking["bookingID"] . "</p>";
            echo "<p><strong>Room ID:</strong> " . $booking["room_id"] . "</p>";
            echo "<p><strong>Check-in Date:</strong> " . $booking["checkin_date"] . "</p>";
            echo "<p><strong>Checkout Date:</strong> " . $booking["checkout_date"] . "</p>";
            echo "<p><strong>First Name:</strong> " . $booking["firstname"] . "</p>";
            echo "<p><strong>Last Name:</strong> " . $booking["lastname"] . "</p>";
            echo "<p><strong>Contact Number:</strong> " . $booking["contact_number"] . "</p>";
        } else {
            echo "Booking not found.";
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
