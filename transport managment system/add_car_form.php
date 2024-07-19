<?php
include 'db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST['car_name'];
    $model = $_POST['model'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $available = $_POST['available'];  // Corrected variable name

    $sql = "INSERT INTO cars (car_name, model, category, price, image, available) VALUES ('$brand', '$model', '$category', '$price', '$image', '$available')";  // Corrected variable and field name

    if ($conn->query($sql) === TRUE) {
        $message = "Car added successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Car</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f2f2f2;
            color:green;
        }
    </style>
</head>
<body>
    <h2 style="display:flex;align-items:end;justify-content:end;margin-right:20px"><a href="dashboard.php">BACK</a></h2>
    <div class="container" style="color:white">
        <h2 style="display:flex;align-items:center;justify-content:center">Add Car</h2>
        <?php if (!empty($message)) { ?>
            <p class="message"><?php echo $message; ?></p>
        <?php } ?>
        <form action="add_car_form.php" method="post">
           <div class="form-group">
                <label for="car_name">Car_name:</label>
                <input type="text" id="car_name" name="car_name" required style="background-color:white">  <!-- Corrected name -->
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" required style="background-color:white">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required style="background-color:white">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" id="price" name="price" required style="background-color:white;width:92%">
            </div>
            <div class="form-group">
                <label for="image">Image URL:</label>
                <input type="text" id="image" name="image" required style="background-color:white">
            </div>
            <div class="form-group">
                <label for="available">Available:</label>
                <input type="number" id="available" name="available" required style="background-color:white">  <!-- Corrected name -->
            </div>
            <div class="form-group">
                <input type="submit" value="Add Car" style="background-color:white;color:black;width:96%">
            </div>
        </form>
    </div>
</body>
</html>
