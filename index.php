<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Store</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Available Articles</h1>
    <div class="row">
        <?php
        // Connect to MySQL database
        $conn = mysqli_connect("localhost", "root", " ", "products");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch articles from database
        $sql = "SELECT * FROM articles";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            
            while ($row = $result->fetch_assoc()) {

            ?>

                '<div class="col-md-4 mb-3">';
                '<div class="card">';
                '<div class="card-body">';
                '<h5 class="card-title">'<?php echo $row["name"] ?> '</h5>';
                '<p class="card-text">' <?php echo $row["description"] ?> '</p>';
                '<a href="detail.php?id=' <?php echo $row["article_id"] ?> '" class="btn btn-primary">View Details</a>';
                '</div>';
                '</div>';
                '</div>';

            <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>