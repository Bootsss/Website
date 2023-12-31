<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JakobM 608 AS1</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="Index.html">Home</a></li>
                <li><a href="BookingsMake.html">Make Booking</a></li>
                <li><a href="privacy.html">Privacy</a></li>
            </ul>
        </nav>
    </header>

    <section id="home">
        <div class="hero-content">
            <h1>Staff Section</h1>
        </div>
    </section>

    <!-- About Section -->
    <section class="grid-container">
        <div class="top-left">
            <h2>Add Customer</h2>
            <form action="add_customer.php" method="POST">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" id="firstName" required>
                <br>
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" id="lastName" required>
                <br>
                <label for="bookingId">Booking ID:</label>
                <input type="number" name="bookingId" id="bookingId" required>
                <br>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
                <br>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
                <br>
                <input type="submit" name="submit" value="Add Customer">
            </form>
        </div>

        <div class="top-right">
            <h2>Search Customer by Name</h2>
            <form action="search_customer.php" method="GET">
                <label for="lastName">Customer Last Name:</label>
                <input type="text" name="lastName" id="lastName" required>
                <input type="submit" name="submit" value="Search">
            </form>
            <table border="2">
                <tr>
                    <th>Customer Name</th>
                    <th>Booking ID</th>
                    <th>Room #</th>
                    <th>Room name</th>
                    <th>Room type</th>
                    <th>Beds</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <td>Jane Doe</td>
                    <td>1</td>
                    <td>2</td>
                    <td>Herman</td>
                    <td>D</td>
                    <td>5</td>
                    <td><button>Edit</button></td>
                    <td><button>Delete</button></td>
                </tr>
            </table>
        </div>

        <div class="bottom-left">
            <hr>
            <div class="room-management-container">
                <h2>Add New Room</h2>
                <form action="add_room.php" method="POST">
                    <label for="roomName">Room Name:</label>
                    <input type="text" name="roomName" id="roomName" required>
                    <br>
                    <label for="roomType">Room Type:</label>
                    <input type="text" name="roomType" id="roomType" required>
                    <br>
                    <label for="beds">Beds:</label>
                    <input type="number" name="beds" id="beds" required>
                    <br>
                    <input type="submit" name="submit" value="Add Room">
                </form>
            </div>
            <hr>
            <div class="room-management-container">
                <h2>Delete Room</h2>
                <form action="delete_room.php" method="POST">
                    <label for="roomId">Room ID:</label>
                    <input type="number" name="roomId" id="roomId" required>
                    <br>
                    <input type="submit" name="submit" value="Delete Room">
                </form>
            </div>
        </div>

        <div class="bottom-right">
            <h2>List Current Bookings</h2>
            <form action="list_bookings.php" method="POST">
                <input type="submit" name="submit" value="List Bookings">
            </form>

            <h2>Search for a Booking</h2>
            <form action="search_booking.php" method="POST">
                <label for="bookingID">Booking ID:</label>
                <input type="text" name="bookingID" id="bookingID" required>
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
    </section>
</body>
</html>
