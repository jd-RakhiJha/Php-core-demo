<?php

include("db.php");

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$query = "SELECT * FROM user WHERE id = {$id}";
$result = mysqli_query($conn, $sql) or die("queery unsuccessful.");

if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_assoc($result));
}
   
?>


<!-------html code ----->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
</head>
<body>
    
<h2 class="text justify-content-center">Create an Account</h2>


<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" novalidate enctype="multipart/form-data">

        <div class="row">
            <div class="col-50">
                
                <div class="mb-2">
                    <label for="formFile" class="form-label">Profile Image</label>
                    <input class="form-control" name="profile_name" type="file" id="formFile">
                </div>

                <div class="container">
                    <label for="employe id">Gender</label>
                    <select name="gender" data-mdb-select-init>
                    <option value="1" <?php if ($row['gender'] == '1') echo 'selected'; ?>>Gender</option>
                    <option value="2" <?php if ($row['gender'] == '2') echo 'selected'; ?>>Female</option>
                    <option value="3" <?php if ($row['gender'] == '3') echo 'selected'; ?>>Male</option>
                    <option value="4" <?php if ($row['gender'] == '4') echo 'selected'; ?>>Other</option>
                    </select>
                </div>

                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your fname" value="<?php echo $row['firstname']; ?>">

                <label for="mname">Middle Name</label>
                <input type="text" id="mname" name="middlename" placeholder="Your mname" value="<?php echo $row['middlename']; ?>">

                <label for="lname"> Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your lname" value="<?php echo $row['lastname']; ?>">



                <div class="container">
                    <label for="birthdayDate" class="form-label">Birthday</label>
                    <input type="text" name="birthday" class="form-control form-control-lg" id="birthdayDate" <?php echo $row['birthday']; ?> />
                </div>

            </div>

            <label for="employe id">Marital</label>
            <select name="marital"data-mdb-select-init>
                <option value="1" <?php if ($row['marital'] == '1') echo 'selected'; ?>>Single</option>
                <option value="2" <?php if ($row['marital'] == '2') echo 'selected'; ?>>Married</option>
                <option value="3" <?php if ($row['marital'] == '3') echo 'selected'; ?>>Unmarried</option>
            </select>

            <div class="container">
                <label for="mumber"> Mobile</label>
                <input type="number" id="mobileN" name="mobile" placeholder="Your number" value="<?php echo $row['mobile']; ?>">
            </div>
        </div>

        <div class="container"></div>
        <label for="adr">Address1</label>
        <input type="text" id="adr" name="address1" placeholder="Your Address" value="<?php echo $row['address1']; ?>">
        </div>

        <div class="container"></div>
        <label for="adr">Address2</label>
        <input type="text" id="adr" name="address2" placeholder="Your Address" value="<?php echo $row['address2']; ?>">
        </div>

        <div class="container"></div>
        <label for="adr">Country</label>
        <input type="text" id="country" name="country" placeholder="country" value="<?php echo $row['country']; ?>">
        </div>

        <label for="city"> City</label>
        <input type="text" id="city" name="city" placeholder="city" value="<?php echo $row['city']; ?>">

        <div class="container"></div>
        <label for="state"> State</label>
        <input type="text" id="state" name="state" placeholder="state" value="<?php echo $row['state']; ?>">
        </div>

        <div class="container">
            <label for="joindate" class="form-label">Join Date</label>
            <input type="text" name="joindate" class="form-control form-control-lg" id="joindate" value="<?php echo $row['state']; ?>">
        </div>

        <div class="container">
            <label for="leavedate" class="form-label">Leave Date</label>
            <input type="text" name="leavedate" class="form-control form-control-lg" id="leavedate" value="<?php echo $row['state']; ?>">
        </div>

        <div class="container"></div>
        <label for="status">Status</label>
        <input type="text" id="status" name="status" placeholder="Status" value="<?php echo $row['status']; ?>">
        </div>

        <div class="container"></div>
        <label for="role">Role</label>
        <input type="text" id="role" name="role" placeholder="Role" value="<?php echo $row['role']; ?>">
        </div>

        <div class="container"></div>
        <label for="position">Position</label>
        <input type="text" id="position" name="position" placeholder="position" value="<?php echo $row['position']; ?>">
        </div>

        <div class="container"></div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your Email" value="<?php echo $row['email']; ?>">
        </div>


        <!-- Submit Button -->
        <div class="d-flex justify-content-center">
            <button type="submit" name="submit" class="btn btn-success btn-block btn-lg">Register</button>
        </div>

    </form>

</body>
</html>




