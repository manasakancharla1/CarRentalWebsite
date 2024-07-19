<?php
include 'db.php';

$category = isset($_GET['category']) ? $_GET['category'] : 'All';

$sql = "SELECT * FROM cars";

if ($category !== 'All') {
    $sql .= " WHERE category = '$category'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Filtered Results</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .car-image {
            max-width: 100%;
            height: auto;
        }
        body{
          color:white;
        }
    </style>
</head>
<body>
    <h2>Filtered Results: <?php echo $category; ?></h2>
    
    <?php while($row = $result->fetch_assoc()) { ?>
        <div class="car">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['brand']; ?>" class="car-image">
            <h3><?php echo $row['brand']; ?> <?php echo $row['model']; ?></h3>
            <p>Category: <?php echo $row['category']; ?></p>
            <p>Price: <?php echo $row['price']; ?></p>
        </div>
    <?php } ?>

    <p><a href="categories.php">Back to Categories</a></p>
</body>
</html>
