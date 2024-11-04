<?php
include('../db.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>

 
 <div class="form-popup" id="myForm">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-container" novalidate enctype="multipart/form-data">
            <h1>Products</h1>

            <label for="text"><b>SKU</b></label>
            <input type="text" placeholder="Enter name" name="sku" required><br>

            <label for="text"><b>Name</b></label>
            <input type="text" placeholder="Enter name" name="name" required><br>

            <label for="text"><b>Price</b></label>
            <input type="number" placeholder="Enter price" name="price" required><br>

            <label for="text"><b>Main_image</b></label>
            <input type="file"  name="main_image" required><br>

            <label for="text"><b>Image_Gellery</b></label>
            <input type="file" multiple name="image_gellery[]" required><br>

            <label for="text"><b>Description</b></label>
            <input type="text" placeholder="Enter description" name="description" required><br>

            <label for="text"><b>Tags</b></label>
            <input type="text" placeholder="Enter tags" name="tags" required><br>


            <button type="submit" class="btn" name="submit">submit</button>
           
        </form>
</div>   
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $tags = $_POST['tags'];
        $sku = $_POST['sku'];
       



        $filename = $_FILES["main_image"]["name"];
        # echo "File Name: " . $filename;
         $tempname = $_FILES["main_image"]["tmp_name"];
         if (!file_exists('assets/image/')) {
             mkdir('assets/image/', 0755, true);
         }
         $folder = "assets/image/" . $filename;
 
         if (move_uploaded_file($tempname, $folder)) {
             echo "File uploaded successfully!";
         } else {
             exit("File does not uploaded!");
         }



         $uploadDir = 'assets/';
         $allowedTypes = array('jpg', 'jpeg', 'png', 'gif'); 
       
         foreach ($_FILES['image_gellery']['tmp_name'] as $key => $tmpName) {
             $multipleFile = basename($_FILES['image_gellery']['name'][$key]);
             $targetFilePath = $uploadDir . $multipleFile;
         
           
             $fileType = pathinfo($multipleFile, PATHINFO_EXTENSION);
         
             
             if (in_array(strtolower($fileType), $allowedTypes)) {
                
                 if (move_uploaded_file($tmpName, $targetFilePath)) {
                     echo "File " . $multipleFile . " uploaded successfully.<br>";

                     $multipleFiles[] = $multipleFile;
                 } else {
                     echo "Error uploading file " . $multipleFile . ".<br>";
                 }
             } else {
                 echo "Invalid file type for " . $multipleFile . ". Only JPG, JPEG, PNG, and GIF files are allowed.<br>";
             }
         }

         $serializedFiles = serialize($multipleFiles);
         echo $serializedFiles;

         $value = unserialize($serializedFiles);
       print_r($value);

         $sql = "INSERT INTO product (sku, name, price, main_image, image_gellery, description, tags) 
         VALUES ('$sku', '$name', '$price', '$filename', '$serializedFiles', '$description', '$tags')";


if (mysqli_query($mysqli, $sql)) {
    echo "Product successfully added!";
} else {
    echo "Error: " . mysqli_error($mysqli);
}
         
         }
        }

?>