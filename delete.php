<?php
include("db.php");


if (isset($_GET['key'])) {
    $id = $_GET['key'];


    $query = "DELETE FROM user WHERE id=" . $id;

    $result = mysqli_query($conn, $query);

    if ($result) {

        header("Location: view.php");
        exit();

    } else {
       
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No ID provided for deletion.";
}

?>