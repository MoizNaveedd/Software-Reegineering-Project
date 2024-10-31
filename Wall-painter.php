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
    <link rel="stylesheet" href="Wall-painter.css">
    <title>Wall Painter</title>
    <style>
        .review-sec{
   width: 100%;
  margin: 20px;
  font-size: 1.25em;
font-family: 'Roboto';
text-align: left !important; 
  padding: 20px;

}
.footer{
    margin-top:50vh !important;
}

.reviews{
  margin-bottom: 20px;
  padding: 10px;
  border: 1px solid #ccc;
  background-color: #fff;
  font-size: 1.25em;
  text-align:left !important;
}
.paraa{
text-align:left !important;
margin: 10px !important;}
.reviews h2{
  font-family: 'Belleza' !important;
  text-align:center;
}
    </style>
</head>

<body>
    <section class="header">
        <div class="banner">
            <nav>
                <img class="logo" src="Pic/home - vices-logo(4) 1.png" alt="logo">
                <a href="review.php" target="_blank" rel="noopener noreferrer">REVIEW</a>
                <a href="contact.php" target="_blank" rel="noopener noreferrer">CONTACT</a>
                <a href="about.html" target="_blank" rel="noopener noreferrer">ABOUT</a>
                <a href="book.html" target="_blank" rel="noopener noreferrer">BOOK NOW</a>
                <a href="our-services.html" target="_blank" rel="noopener noreferrer">SERVICES</a>
                <a href="index.html" target="_blank" rel="noopener noreferrer">HOME</a>
            </nav>
            <div class="tag">
                <h1 class="title">WALL PAINTER</h1>
            </div>
        </div>

    </section>
    <section class="main">
        <h1 class="heading">DETAILED DESCRIPTION</h1>

        <p>Our painting service is designed to transform your home or business into a beautiful and inviting space. We
            use only high-quality paints and materials to ensure that your walls, ceilings, and trim are finished to
            perfection. Our team of skilled painters has the expertise and experience to handle any painting project,
            whether it's a small touch-up or a complete interior or exterior painting overhaul.</p>

        <p>At our painting service, we understand that choosing the right color scheme is crucial in creating the
            ambiance and atmosphere you desire. That's why we offer color consultation services to help you choose the
            perfect color palette for your space. Our team of experts will work closely with you to understand your
            vision and preferences and provide you with a customized color scheme that reflects your style and
            personality.</p>

        <p>We also understand the importance of cleanliness and safety in painting projects. That's why we take all
            necessary precautions to protect your property and ensure a clean and safe work environment. From covering
            floors and furniture to disposing of hazardous materials, we take care of every detail to ensure a
            stress-free and hassle-free painting experience.</p>

        <p>In summary, our painting service is committed to providing you with a high-quality, personalized, and
            stress-free painting experience. Whether you are looking to refresh your home or business, or to create a
            unique and inviting atmosphere, you can trust us to deliver exceptional results that exceed your
            expectations.</p>
            <a href="book.html"><button>Book now</button></a>
            <div class="review-sec">
    <div class="reviews">
        <h2>REVIEWS</h2>
        <?php
        $con = mysqli_connect("localhost","root","ashy1234$");
        if(!$con){
            echo "couldn't connect to server";
            die();
        }
        $DB = mysqli_select_db($con,"home_vices");
        if (!$DB){
            echo"Couldn't select database";
        }
        $currentFile = $_SERVER['PHP_SELF'];
        $currentPage = basename($currentFile);

        // echo "Current Page: " . $currentPage;
        
        $sql = "SELECT * FROM review WHERE serviceName = 'Painter'";

        // Execute the query
        $result = $con->query($sql);

        // Initialize an array variable to store the rows
        $rows = array();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Loop through the result set and store each row in the array
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        } else {
            echo "No reviews yet.";
        }
        
        foreach ($rows as $row) {
           
            echo "<p class='paraa'>NAME: " . $row['clientName'] . "<br>";
            echo "REVEIW: " . $row["review"] . "<br>";
            echo "RATING: " . $row["rating"] . "<br>";
            echo "DATE: " . $row["date"] . "<br></p>";
        }
        ?>
    </div>
    </div>

    </section>
    <section class="footer">
        <p class="last-text">We make interiors infused with the spirit of contemporary design and minimalist
            philosophies.</p>
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