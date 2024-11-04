<?php
include('db.php');
$query = "select * from user";
$result = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Page</title>
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
        <h2>View List</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                     <th>id</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Profile Image</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Marital</th>
                    <th>Mobile</th>
                    <th>Address1</th>
                    <th>address2</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Join Date</th>
                    <th>Leave Date</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Create_At</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['middle_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><img height="100px" width="100px" src="<?php echo "https://brandclever.in/developer/Rakhi/image/" . $row['profile_image'];?>"> </td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['birthday'] ?></td>
                        <td><?php echo $row['marital'] ?></td>
                        <td><?php echo $row['mobile'] ?></td>
                        <td><?php echo $row['address1'] ?></td>
                        <td><?php echo $row['address2'] ?></td>
                        <td><?php echo $row['country'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                        <td><?php echo $row['state'] ?></td>
                        <td><?php echo $row['join_date'] ?></td>
                        <td><?php echo $row['leave_date'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><?php echo $row['role'] ?></td>
                        <td><?php echo $row['position'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['created At'] ?></td>
                       <td> <a href="register.php?id=<?php echo $row['id']; ?>">Edit</a><br>
                        <a href="delete.php?key=<?php echo $row['id'];?>" 
                        onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                        </td>

                </tr>

            <?php
                    }

            ?>




        </table>
    </div>


</body>

</html>

<?php



?>