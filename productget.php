
<?php
include('../db.php');
$query= "SELECT * FROM product";
$result = mysqli_query($mysqli, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product view</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   

    <style>
     .container {
    width: 110px;
    margin: 0px;
}
    </style>
</head>
<body>
 

<div class="container">
        <h2>product View </h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                     <th>id</th>
                    <th>sku</th>
                    <th>Name</th>
                    <th>price</th>
                    <th> Main_Image</th>
                    <th>Image_gellery</th>
                    <th>Description</th>
                    <th>Tags</th>
                </tr>
                
            </thead>

            <tbody>
            <tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['main_image'] ?></td>
                        <td><?php echo $row['image_gellery'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['tags'] ?></td>
            
                     
            </tr>

            <?php
                    }

            ?>
            </tbody>
    
</body>
</html>



