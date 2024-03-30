<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <?php
    // Connect to MySQL database
    $conn = mysqli_connect("localhost", "username", "password", "database");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process order
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $article_id = $_POST['article_id'];
        $quantity = $_POST['quantity'];
        // Add your order processing logic here
    }
    ?>
    <h1>Place Order</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
        </div>
        <input type="hidden" name="article_id" value="<?php echo $_GET['id']; ?>">
        <button type="submit" class="btn btn-primary">Submit Order</button>
    </form>
</div>

</body>
</html>