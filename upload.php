<?php
include('../db.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Form</title>
</head>

<body>
    <h2>Slider Form</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">


        <label for="image">Slider Image:</label>
        <input type="file" name="image" id="image" required><br><br>


        <label for="slider_text">Slider Text:</label>
        <input type="text" name="slider_text" id="slider_text" required><br><br>


        <label for="status">Slider Status:</label>
        <select name="status" id="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br><br>

        <button type="submit" name="submit">Upload Slider</button>
    </form>
</body>

</html>



<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['submit'])) {

        $slider_text = mysqli_real_escape_string($mysqli, $_POST['slider_text']);
        $status = mysqli_real_escape_string($mysqli, $_POST['status']);


        $slider_text = $_POST['slider_text'];
        $Slider_Status = $_POST['status'];
        $added_data = date("Y-m-d H:i:s");
        $modify_data = date("Y-m-d H:i:s");


        $filename = $_FILES["image"]["name"];
       # echo "File Name: " . $filename;
        $tempname = $_FILES["image"]["tmp_name"];
        if (!file_exists('assets/image/')) {
            mkdir('assets/image/', 0755, true);
        }
        $folder = "assets/image/" . $filename;

        // Attempt to move the uploaded file
        if (move_uploaded_file($tempname, $folder)) {
            echo "File uploaded successfully!";
        } else {
            exit("File does not uploaded!");
        }


        $sql = "INSERT INTO slider (image, slider_text, status, added_data, modify_data) 
        VALUES ('$filename', '$slider_text', '$status', '$added_data', '$modify_data')";

     if (mysqli_query($mysqli, $sql)) {
    echo "Slider successfully added!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}
} else {
echo "Sorry, there was an error uploading your file.";
}

}
?>