<?php
// Include any necessary PHP files or configuration here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakob Privacy Webpage</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    
    <header>
        <nav>
            <ul>
                <li><a href="Index.html">Home</a></li>
                <li><a href="BookingsMake.html">Make Booking</a></li>
                <li><a href="staff.html">Staff</a></li>
            </ul>
        </nav>
    </header>

    
    <section id="home">
        <div class="hero-content">
            <h1>Jakob Privacy Webpage</h1>
            <p>This is where you will find the privacy statement for the restaurant.</p>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <h2>Privacy Statement</h2>
            <p>We collect personal information from you, including information about your:
                name
                contact information
                interactions with us
                billing or purchase information
                We collect your personal information in order to:
                in order to drive more customers to the business
                We keep your information safe by storing it in encrypted files and only allowing certain staff to access it.
                
                We keep your information for one year at which point we securely destroy it by erasing everything.
                You have the right to ask for a copy of any personal information we hold about you, and to ask for it to be corrected if you think it is wrong. If you’d like to ask for a copy of your information, or to have it corrected, please contact us at jakmogford@gmail.com, or 0220897730, or 24 Te Huia.</p>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <form action="contact_form_handler.php" method="post"> <!-- Will replace with real form handling soon -->
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; Jakob Mogford 608 Privacy Statement.</p>
    </footer>
</body>
</html>
