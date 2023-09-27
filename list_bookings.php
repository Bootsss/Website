<?php
// Include your database configuration file
include_once "db_config.php"; // Replace with your actual database config file

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve bookings data
$query = "SELECT * FROM process_booking";
$result = $conn->query($query);

// Check if there are any bookings
if ($result->num_rows > 0) {
    echo "<h1>Current Bookings</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Room ID</th><th>Check-in Date</th><th>Checkout Date</th><th>First Name</th><th>Last Name</th><th>Actions</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["bookingID"] . "</td>";
        echo "<td>" . $row["room_id"] . "</td>";
        echo "<td>" . $row["checkin_date"] . "</td>";
        echo "<td>" . $row["checkout_date"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>";
        echo "<a href='view_booking.php?id=" . $row["bookingID"] . "'>View</a> | ";
        echo "<a href='edit_booking.php?id=" . $row["bookingID"] . "'>Edit</a> | ";
        echo "<a href='delete_booking.php?id=" . $row["bookingID"] . "'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No bookings found.";
}

// Close the database connection
$conn->close();
?>