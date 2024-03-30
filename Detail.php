<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Details</title>
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

    // Fetch article details based on ID
    $article_id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE article_id = $article_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

     '<h1>' <?php echo $row["name"] ?>'</h1>';
     '<p>' .<?php echo $row["description"]?> '</p>';
     '<p>Price: $' . $row["price"] . '</p>';
     '<img src="' . $row["image_url"] . '" class="img-fluid" alt="Article Image">';
     '<a href="order.php?id=' . $row["article_id"] . '" class="btn btn-primary">Place Order</a>';
    } else {
        echo "Article not found";
    }
    $conn->close();
    ?>
</div>

</body>
</html>