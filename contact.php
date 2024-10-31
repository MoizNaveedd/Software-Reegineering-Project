<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="Pic/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Pic/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Pic/icon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
    href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Noto+Sans&family=PT+Serif&family=Roboto:wght@100&display=swap"
    rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Belleza&family=Dancing+Script&family=Noto+Sans&family=PT+Serif&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="contact-us.css">
    <title>Home-Vices | Contact Us</title>
</head>

<body>
    <section class="first-sec"> 
        <div class="banner">
        <nav>
            <img class="logo" src="Pic/home - vices-logo(4) 1.png" alt="logo">
            <a href="review.php" target="_blank" rel="">REVIEW</a>
            <a href="contact.php" target="_blank" rel="">CONTACT</a>
            <a href="about.html" target="_blank" rel="">ABOUT</a>
            <a href="book.html" target="_blank" rel="">BOOK NOW</a>
             <a href="our-services.html" target="_blank" rel="">SERVICES</a>
             <a href="index.html" target="_blank" rel="">HOME</a>
        </nav>
    <div class="tag">
        <div class="title">
        <h1>Contact Us</h1>
        <p> Need a problem solved?</p>
        <p> Contact us and let’s find a solution together for your betterment .</p>
    </div>
</div>
</div>
    </section>

    <section class="second-sec">
        <div class="left-col">
            <form action="contact_process.php" method="post">
            <input type="text" placeholder="First Name" name="fname" required>
            <input type="text" placeholder="Last Name" name="lname" required>
            <input type="email" placeholder="Email Address" name="email" required>
            <input type="text" placeholder="Phone" name="phone" required>
            <textarea name="Message" id="Message" cols="30" rows="10" placeholder="Message" maxlength="300"></textarea>

            <button> SEND MESSAGE</button>
            <div id="messageSent">
        <?php
            session_start();
            if (isset($_SESSION['message'])) {
                echo '<p>' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message']); // Clear the session variable after displaying the message
            }            
            ?>
            <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     var messageElement = document.getElementById("messageSent");

            
        setTimeout(function() {
        var myDiv = document.getElementById("messageSent");
        myDiv.style.visibility = "hidden";
        }, 7000);
        </script></div>
            </form>
        </div>

        <div class="right-col">
            <h2>Contact Us</h2>
            <div class="vline"></div>
            <p>Our Commitment to You <br>
                At our company, we believe that our success is directly tied to your satisfaction. That's why we're committed to providing exceptional customer service and support every step of the way. Whether you're a long-time customer or a new client, we're dedicated to helping you achieve your goals. We're always looking for ways to improve our products and services, and we value your feedback. Please don't hesitate to let us know how we can serve you better.</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7235.969795670105!2d67.10825629214933!3d24.932584390516023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb338bf22becb0f%3A0xd5e50842c5c4867b!2sNED%20University%20Of%20Engineering%20%26%20Technology%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1689569494164!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
    </section>
    <section class="last-sec">
        <p class="last-text">We provide services infused with the spirit of advancing lifestyles and minimalist philosophies.</p>

        <a href="https://www.facebook.com/profile.php?id=100049033391215"><i class="fa fa-facebook-square fa-2x facebook" aria-hidden="true"></i></a>
        <a href="https://www.linkedin.com"><i class="fa fa-linkedin-square fa-2x facebook" aria-hidden="true"></i></a>
        <a href="https://www.pinterest.com"><i class="fa fa-pinterest-square fa-2x facebook" aria-hidden="true"></i></a>
        <a href="https://twitter.com/Devil86247985"><i class="fa fa-twitter-square fa-2x facebook" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/khushbakhtkhan_/"><i class="fa fa-instagram fa-2x facebook" aria-hidden="true"></i></a>
        
        <h3>Quick Links</h3>
        <nav>
            <a href="contact.php" target="_blank" rel="noopener noreferrer">Contact</a>
            <a href="about.html" target="_blank" rel="noopener noreferrer">About</a>
            <a href="our-services.html" target="_blank" rel="noopener noreferrer">Serivces</a>
            <a href="index.html" target="_blank" rel="noopener noreferrer">Home</a>
        </nav>
    </section>
</body>

</html>