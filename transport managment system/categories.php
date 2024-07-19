<?php
session_start();
include 'db.php';

// Car rental categories
$car_categories = array(
  "All",
  "SUV",
  "Sedan",
  "Honda",
  "Hybrid",
  "Electric",
  "Convertible",
  "Luxury",
  "Sports",
  "Van/Minivan",
  "Truck"
);

$category = isset($_GET['category']) ? $_GET['category'] : 'All';
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : 999999; // Set a high default value

$sql = "SELECT * FROM cars WHERE price BETWEEN $min_price AND $max_price";

if ($category !== 'All') {
  $sql .= " AND category = '$category'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Categories Filter</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <!-- Bootstrap CSS -->
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
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
        .container1 {
            display: flex;
            height:1200px;
        }
        .sidebar {
            flex: 1;
            padding: 20px;
            height:1400px;
            border-top-right-radius: 170px;
            background-color: #f2f2f2;
        }
        .content {
            flex: 3;
            padding: 20px;
            display: grid;
            width:200px;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            /* gap: 10px; */
        }
        .car-card {
            border: 1px solid #ccc;
            padding: 15px;
            width:90%;
            height:370px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .car-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .car-details {
            font-size: 16px;
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
        @media (max-width: 1024px){
          .car-image{
            height:160px;
          }
          .car-card{
            height:380px;
          }
          .sidebar{
            height:1600px;
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
                    <ul class="navbar-nav">
                    <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="categories.php">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bookings.php">bookings</a>
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
    </header><br>
    <div class="container1">
        <div class="sidebar">
            <h2>Car Rental Categories</h2><br>
            <ul style="list-style-type:none;">
                <?php foreach ($car_categories as $categoryItem) { ?>
                    <li><a href="categories.php?category=<?php echo $categoryItem; ?>&min_price=<?php echo $min_price; ?>&max_price=<?php echo $max_price; ?>"style="color:black;text-decoration:none;font-size:22px"><?php echo $categoryItem; ?></a></li><hr><br>
                    <?php } ?>
            </ul>
            <form class="filter-form" action="categories.php" method="get" style="margin-left:40px">
                <label for="min_price">Min Price:</label><br>
                <input type="number" id="min_price" name="min_price" value="<?php echo $min_price; ?>"><br><br>
                
                <label for="max_price">Max Price:</label><br>
                <input type="number" id="max_price" name="max_price" value="<?php echo $max_price; ?>"><br><br>
                
                <input type="hidden" name="category" value="<?php echo $category; ?>">
                <input type="submit" value="Apply Filter" style="background-color:black;width:200px;height:50px;border-radius:10px;color:white">
                </form>
        </div>
        <div class="content">
            <?php while($row = $result->fetch_assoc()) { ?>
                <div class="car-card" style="color:white" onclick="showToast('<?php echo $row['car_name']; ?>', '<?php echo $row['model']; ?>')">
                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['car_name']; ?>" class="car-image">
                    <div class="car-details">
                        <p>Car_name:<?php echo $row['car_name']; ?></p><p>Model:<?php echo $row['model']; ?></p>
                        <p>Category: <?php echo $row['category'];?></p>
                        <p>Price: <?php echo $row['price']; ?></p>
                        <a href=""><button style="width:230px;height:30px;background-color:orangered;border-radius:5px;color:white">Book</button></a>
                    </div>
                </div>
            <?php } ?>
        </div>
            </div>
</body>
</html>
