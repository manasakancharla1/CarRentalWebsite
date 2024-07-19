<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="styles.css">
         <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- Bootstrap CDN (assuming you're using Bootstrap based on your classes) -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <title>CAR RENTAL</title>
    <style>
        body {
            background-color: black;
            padding: 0px;
        }

        h1 {
            display: inline;
            color: black;
            margin-left: 100px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-left: 20px;
            font-size: 23px;
        }

        nav ul li a {
            text-decoration: none;
            color:black;
            
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Make carousel images responsive */
        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }
        @media (max-width: 768px) {
    .col-12.col-md-6 img {
        max-width: 100%; /* Set maximum width to 100% of the container */
        height: 300px;
        padding:0px;    /* Maintain aspect ratio */
    }
        }
        .footer {
  display: flex;
  flex-flow: row wrap;
  padding: 30px 300px 20px 300px;
  color: #2f2f2f;
  background-color: #f2eee3;
  border-top: 1px solid #e5e5e5;
  width:100%;
}

.footer > * {
  flex:  1 100%;
}

.footer__addr {
  margin-right: 1.25em;
  margin-bottom: 2em;
}

.footer__logo {
  font-family: 'Pacifico', cursive;
  font-weight: 400;
  text-transform: lowercase;
  font-size: 2rem;
}

.footer__addr h2 {
  margin-top: 1.3em;
  font-size: 15px;
  font-weight: 400;
}

.nav__title {
  font-weight: 400;
  font-size: 15px;
}

.footer address {
  font-style: normal;
  color: #999;
}

.footer__btn {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 36px;
  max-width: max-content;
  background-color: rgb(33, 33, 33, 0.07);
  border-radius: 100px;
  color: #2f2f2f;
  line-height: 0;
  margin: 0.6em 0;
  font-size: 1rem;
  padding: 0 1.3em;
}

.footer ul {
  list-style: none;
  padding-left: 0;
}

.footer li {
  line-height: 2em;
}

.footer a {
  text-decoration: none;
}

.footer__nav {
  display: flex;
	flex-flow: row wrap;
}

.footer__nav > * {
  flex: 1 50%;
  margin-right: 1.25em;
}

.nav__ul a {
  color: #999;
}

.legal {
  display: flex;
  flex-wrap: wrap;
  color: #999;
}
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
@media screen and (min-width: 24.375em) {
  .legal .legal__links {
    margin-left: auto;
  }
}

@media screen and (min-width: 40.375em) {
  .footer__nav > * {
    flex: 1;
  }

  .footer__addr {
    flex: 1 0px;
  }

  .footer__nav {
    flex: 2 0px;
  }
}

    </style>
</head>

<body>
    <header style="background-color: white; margin-top: 10px;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.php" style="margin-left:-120px"><h1>RENTAL</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav" >
                    <ul class="navbar-nav" style="margin-right:-100px">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="scrollToAbout()">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="scrollToVehicles()">Vehicles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="scrollToReviews()">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="scrollToFeedback()">Feedback</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <?php 
                                if (isset($_SESSION['username'])) {
                                    echo '<button class="dropbtn">Welcome, ' . $_SESSION['username'] . '</button>';
                                } else {
                                    echo '<a href="register.php" class="dropbtn">Sign Up / Log In</a>';
                                }
                                ?>
                                <div class="dropdown-content" style="font-size:20px">
                                    <a href="#">Update Profile</a>
                                    <a href="logout.php">Log Out</a>
                                    <a href="#">Link 3</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cimg2.ibsrv.net/ibimg/hgm/2000x1125-1/100/636/2018-jeep-wrangler_100636230.jpg"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8fA%3D%3D"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://d2m3nfprmhqjvd.cloudfront.net/blog/20221007175117/Spinny-Assured-XUV700-silver-1160x653.jpg"
                    class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>

    <div class="container" style="width:100%;" id="about">
        <div class="alert alert-light text-center mt-4 mb-4" role="alert" style="font-size: 20px; font-weight: bold;color:black;" id="About Us">
            About Us
        </div>
    </div>
    <div class="container mt-5"> <!-- Centering the container -->
    <div class="card mb-3" style="max-width: 1200px; margin: auto; background-color: black;">
        <div class="row g-0">
            <div class="col-12 col-md-6">
                <img src="https://stimg.cardekho.com/images/carexteriorimages/630x420/MG/4-EV/9523/1672834026501/front-left-side-47.jpg?imwidth=420&impolicy=resize" class="img-fluid rounded-start" alt="..." style="height: 480px; width: 100%; border-radius: 10px;">
            </div>
            <div class="col-12 col-md-6">
                <div class="card-body" style="color: white;">
                    <h5 class="card-title" style="color: orangered; text-decoration: underline;">About Us</h5>
                    <p class="card-text">
                        Welcome to [Your Company Name], your reliable partner in car rental services. With years of experience in the industry, we are committed to providing our customers with top-quality vehicles and exceptional service at competitive prices.
                    </p>
                    <p>
                        At [Your Company Name], we understand that each customer has unique needs and preferences. That's why we offer a diverse fleet of well-maintained vehicles to cater to various requirements, whether you need a compact car for city driving or a spacious SUV for a family vacation.
                    </p>
                    <p>
                        Our team of dedicated professionals is always ready to assist you in finding the perfect vehicle to suit your needs and budget. We strive to make the rental process as seamless and hassle-free as possible, ensuring a pleasant and enjoyable experience for our customers.
                    </p>
                    <p>
                        Choose [Your Company Name] for your next car rental and experience the difference of renting from a company that puts your satisfaction first. We look forward to serving you and making your journey memorable.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <div class="container" style="width:100%;" id="Vehicles">
        <div class="alert alert-light text-center mt-4 mb-4" role="alert" style="font-size: 20px; font-weight: bold;color:black;" id="About Us">
            Vehicles
        </div>
        <p style="display:flex;align-items:center;justify-content:center;font-size:21px;color:orange">We have all types of cars</p>
        <p style="display:flex;align-items:center;justify-content:center;font-size:19px;color:orange">Explore Our Cars</p></br>
        <!-- <section class="container1"> -->
         <div class="card__container swiper">
            <div class="card__content">
               <div class="swiper-wrapper">
                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="https://www.financialexpress.com/wp-content/uploads/2021/03/skoda-kushaq-sanskrit-name.jpg?w=1024" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>
      
                     <div class="card__data">
                        <h3 class="card__name"> Skoda's new SUV </h3><hr>
                        <p class="card__description">
                          Fuel:petrol &ensp;|&ensp;Engine-Size:999cc-1498cc &ensp;|&ensp; Mileage:17.2-19.6 &ensp;|&ensp;Size:5 people
                        </p>
                        <?php 
                          if (isset($_SESSION['username'])) {
                              echo '<a href="categories.php" class="card__button">View More</a>';
                          } else {
                              echo '<a href="register.php" class="card__button">View More</a>';
                          }
                          ?>
                     </div>
                  </article>
      
                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="https://fastly-production.24c.in/hello-ar/dev/uploads/660572a76de4599cee8d316d/83e108d9-a1cf-4fe0-b28e-b4b90907def1/slot/10000087788-8d809b9f4f7e4f838b3d94849b8ee557-Exterior-7.jpg?w=500&auto=format" alt="image" class="card__img" style="height:120px">
                        <div class="card__shadow"></div>
                     </div>
      
                     <div class="card__data">
                        <h3 class="card__name">Honda Amaze</h3><hr>
                        <p class="card__description">
                        Fuel:petrol &ensp;|&ensp;Engine-Size:1199cc-1498cc &ensp;|&ensp; Mileage:18.0-19.6 &ensp;|&ensp;Size:5 people
                        </p>
                        <?php 
                          if (isset($_SESSION['username'])) {
                              echo '<a href="categories.php" class="card__button">View More</a>';
                          } else {
                              echo '<a href="register.php" class="card__button">View More</a>';
                          }
                          ?>
                     </div>
                  </article>
      
                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="https://images.91wheels.com/assets/b_images/main/models/profile/profile1701774805.jpg" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>
      
                     <div class="card__data">
                        <h3 class="card__name">Altroz</h3><hr>
                        <p class="card__description">
                        Fuel:P&D &ensp;|&ensp;Engine-Size:1199cc-1497cc &ensp;|&ensp; Mileage:18.0-23.64 &ensp;|&ensp;Size:5 people
                        </p>
                        <?php 
                          if (isset($_SESSION['username'])) {
                              echo '<a href="categories.php" class="card__button">View More</a>';
                          } else {
                              echo '<a href="register.php" class="card__button">View More</a>';
                          }
                          ?>
                     </div>
                  </article>
      
                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFlHNkA8Fxbm-MH3vByFdSFrlM_jicdXGzvq-fgQWhLw&s" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>
      
                     <div class="card__data">
                        <h3 class="card__name">Mahindra Thar</h3><hr>
                        <p class="card__description">
                        Fuel:P&D &ensp;|&ensp;Engine-Size:1500c-3000cc &ensp;|&ensp; Mileage:13.0-18.64 &ensp;|&ensp;Size:4 people
                        </p>
                        <?php 
                          if (isset($_SESSION['username'])) {
                              echo '<a href="categories.php" class="card__button">View More</a>';
                          } else {
                              echo '<a href="register.php" class="card__button">View More</a>';
                          }
                          ?>
                     </div>
                  </article>

                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="https://imgd.aeplcdn.com/664x374/n/cw/ec/128413/scorpio-classic-exterior-right-front-three-quarter-45.jpeg?isig=0&q=80" alt="image" class="card__img" style="height:120px">
                        <div class="card__shadow"></div>
                     </div>
      
                     <div class="card__data">
                        <h3 class="card__name">Mahindra Scorpion</h3><hr>
                        <p class="card__description">
                        Fuel:diesel &ensp;|&ensp;Engine-Size:1500cc-2148cc &ensp;|&ensp; Mileage:13.0-18.64 &ensp;|&ensp;Size:7&9 people
                        </p>
                        <?php 
                            if (isset($_SESSION['username'])) {
                                echo '<a href="categories.php" class="card__button">View More</a>';
                            } else {
                                echo '<a href="register.php" class="card__button">View More</a>';
                            }
                            ?>
                        </div>
                  </article>
               </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next">
               <i class="ri-arrow-right-s-line"></i>
            </div>
            
            <div class="swiper-button-prev">
               <i class="ri-arrow-left-s-line"></i>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
         </div> 
         </div>
      <!-- </section> -->
      <div class="container" style="width:100%;" id="Reviews">
        <div class="alert alert-light text-center mt-4 mb-4" role="alert" style="font-size: 20px; font-weight: bold;color:black;" id="About Us">
            Reviews
        </div>
        <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color:black;">J.K.Rowling<i class="fas fa-star" style="float: right;color:gold"></i></h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color:black">Touseez Isqaz<i class="fas fa-star" style="float: right;color:gold"></i></h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color:black;">Harry Porter<i class="fas fa-star" style="float: right;color:gold"></i></h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color:black">Oliva<i class="fas fa-star" style="float: right;color:gold"></i></h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class=container id="Feedback">
        <div class="alert alert-light text-center mt-4 mb-4" role="alert" style="font-size: 20px; font-weight: bold;color:black;" id="About Us">
            Feedback
        </div>
      <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center" style="color:white">Feedback Form</h2>
            <form action="#" method="post">
                <!-- Name Field -->
                <div class="form-group">
                    <label for="name" style="color:white">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" style="color:white">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Feedback Category -->
                <div class="form-group">
                    <label for="category" style=color:white>Feedback Category:</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Vehicle Quality">Vehicle Quality</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Booking Process">Booking Process</option>
                        <option value="Others">Others</option>
                    </select>
                </div>

                <!-- Comments -->
                <div class="form-group">
                    <label for="comments" style="color:white">Comments:</label>
                    <textarea class="form-control" id="comments" name="comments" rows="4" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit Feedback</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div><br>
<footer class="bg-dark text-white mt-5" style="padding-left:35px">
    <div class="container-fluid w-100">
        <div class="row">
            <!-- About Us -->
            <div class="col-md-4 text-center">
                <h5 style="text-decoration:underline">About Us</h5>
                <p>We are a leading car rental service committed to providing quality vehicles and exceptional customer service.</p>
            </div>
            
            <!-- Contact Information -->
            <div class="col-md-4 text-center">
                <h5 style="text-decoration:underline">Contact Us</h5>
                <p><i class="fa fa-phone"></i> Phone: +123 456 7890</p>
                <p><i class="fa fa-envelope"></i> Email: info@example.com</p>
            </div>
            
            <!-- Social Media Links -->
            <div class="col-md-4 text-center">
                <h5 style="text-decoration:underline">Follow Us</h5>
                <a href="#" class="text-white mr-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white mr-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white mr-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 Your Company Name. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
      </div>

<script>
  function scrollToAbout() {
    const aboutDiv = document.getElementById('about');
    aboutDiv.scrollIntoView({ behavior: 'smooth' });
  }
  function scrollToVehicles() {
    const VehiclesDiv = document.getElementById('Vehicles');
    VehiclesDiv.scrollIntoView({ behavior: 'smooth' });
  }
  function scrollToReviews() {
    const ReviewsDiv = document.getElementById('Reviews');
    ReviewsDiv.scrollIntoView({ behavior: 'smooth' });
  }
  function scrollToFeedback() {
    const FeedbackDiv = document.getElementById('Feedback');
    FeedbackDiv.scrollIntoView({ behavior: 'smooth' });
}
</script>

        <!-- Bootstrap JS and Popper.js -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <!--=============== SWIPER JS ===============-->
      <script src="swiper-bundle.min.js"></script>

      <!--=============== MAIN JS ===============-->
      <script src="main.js"></script>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
       
</body>
</html>