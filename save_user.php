<?php
include 'db_connection.php';

$insert = false;
$error_message = '';

// Define a function to validate the form data
function validateForm($name, $email, $gender, $city) {
    return !empty($name) && !empty($email) && !empty($gender) && !empty($city);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $city = $_POST["city"];

    // Validate form data
    if (validateForm($name, $email, $gender, $city)) {
        // Prepare and execute the SQL INSERT query
        $stmt = $pdo->prepare("INSERT INTO form_valid (name, email, gender, city) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $gender, $city]);

        // Set flag for successful insertion
        $insert = true;
    } else {
        $error_message = "All fields are required!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save User Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Save User Information</h2>
        <?php if(isset($error_message)) { ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label>Gender</label><br>
                <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" id="city" name="city">
                    <option value="New York">New York</option>
                    <option value="Los Angeles">Los Angeles</option>
                    <option value="Chicago">Chicago</option>
                    <option value="Houston">Houston</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
