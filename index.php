<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `tour_records`.`tour` (`name`, `age`, `gender`, `email`, `phone`, `other`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img class="bg" src="Background-image.png" alt="Tour">
    <div class="container">

        <h1>Welcome to Tour and Travels</h1>
        <p>Enter your details and submit the form to confirm your participation for the trip</p>

        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
   

    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name:)">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="text" name="email" id="email" placeholder="Enter your email">
        <input type="text" name="phone" id="phone" placeholder="Enter your phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter and other information here"></textarea>
        <button class="btn">Submit</button>
        
   
    </form>
    

</div>
<script src="index.js"></script>
    
</body>
</html>
