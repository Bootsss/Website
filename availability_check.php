<?php
// availability_check.php
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

if (isset($_POST["availabilityCheckin"]) && isset($_POST["availabilityCheckout"])) {
    $checkin_date = date("Y-m-d", strtotime($_POST["availabilityCheckin"]));
    $checkout_date = date("Y-m-d", strtotime($_POST["availabilityCheckout"]));

    // Query to list available rooms for the selected date range
    $availability_query = "SELECT roomID, roomname FROM room WHERE roomID NOT IN (
        SELECT room_id FROM process_booking WHERE 
        (checkin_date >= '$checkout_date' AND checkout_date <= '$checkin_date')
    )";

    $availability_result = mysqli_query($conn, $availability_query);

    if ($availability_result) {
        $available_rooms = mysqli_fetch_all($availability_result, MYSQLI_ASSOC);

        if (empty($available_rooms)) {
            echo "No rooms available for the selected dates.";
        } else {
            echo "<h3>Available Rooms:</h3>";
            echo "<ul>";
            foreach ($available_rooms as $room) {
                echo "<li>{$room['roomname']}</li>";
            }
            echo "</ul>";
        }
    } else {
        echo "Error fetching availability data: " . mysqli_error($conn);
    }
}
?>
