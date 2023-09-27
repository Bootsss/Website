<?php
// Include any necessary PHP files or configuration here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JakobM 608 AS1</title>
    <link rel="stylesheet" href="styles.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
    
    <header>
        <nav>
            <ul>
                <li><a href="Index.html">Home</a></li>
                <li><a href="staff.html">Staff</a></li>
                <li><a href="privacy.html">Privacy</a></li>
            </ul>
        </nav>
    </header>

    <!-- Home/Top section of the website -->
    <section id="home">
        <div class="hero-content">
            <h1>Jakob Make a Booking Page</h1>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <h1>Make a booking</h1>
            <form action="process_booking.php" method="POST">   
                <label for="roomID">Room (name,type,beds): </label>
                <select name="roomID" id="roomID" required>
                    <?php
                    // Sample room data
                    $sampleRoomData = [
                        ["roomID" => 1, "roomname" => "Kellie", "roomtype" => "S", "beds" => 5],
                        ["roomID" => 2, "roomname" => "Herman", "roomtype" => "D", "beds" => 5],
                        ["roomID" => 3, "roomname" => "Scarlett", "roomtype" => "D", "beds" => 2],
                        ["roomID" => 4, "roomname" => "Jelani", "roomtype" => "S", "beds" => 2],
                        ["roomID" => 5, "roomname" => "Sonya", "roomtype" => "S", "beds" => 5],
                        ["roomID" => 6, "roomname" => "Miranda", "roomtype" => "S", "beds" => 4],
                        ["roomID" => 7, "roomname" => "Helen", "roomtype" => "S", "beds" => 2],
                        ["roomID" => 8, "roomname" => "Octavia", "roomtype" => "D", "beds" => 3],
                        ["roomID" => 9, "roomname" => "Gretchen", "roomtype" => "D", "beds" => 3],
                        ["roomID" => 10, "roomname" => "Bernard", "roomtype" => "S", "beds" => 5],
                        ["roomID" => 11, "roomname" => "Dacey", "roomtype" => "D", "beds" => 2],
                        ["roomID" => 12, "roomname" => "Preston", "roomtype" => "D", "beds" => 2],
                        ["roomID" => 13, "roomname" => "Dane", "roomtype" => "S", "beds" => 4],
                        ["roomID" => 14, "roomname" => "Cole", "roomtype" => "S", "beds" => 1]
                    ];

                    // Populate the dropdown with sample data
                    foreach ($sampleRoomData as $room) {
                        echo '<option value="' . $room['roomID'] . '">' . $room['roomname'] . ',' . $room['roomtype'] . ',' . $room['beds'] . '</option>';
                    }
                    ?>
                </select>
                <br>
                <br>
               
                <label for="checkin">Select start date:</label>
                <input type="text" name="checkin" id="datepicker-checkin" class="flatpickr" required>
                <br>
                <br>
    
                <label for="checkout">Select end date:</label>
                <input type="text" name="checkout" id="datepicker-checkout" class="flatpickr" required>
                
                <br>
                <br>
    
                <label for="firstName">First Name:</label>
                <input
