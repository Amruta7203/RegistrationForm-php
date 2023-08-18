<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if(!$con) {
        die("Connection to this database failed due to ".mysqli_connect_error());
    }
    //echo "Success connecting to the db";

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `phone`, `email`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$phone', '$email', '$desc', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true) {
        //echo "Successfully inserted";
        $insert = true;
    }
    else {
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="malaysia.webp" alt="Image" class="bg">
    <div class="container">
        <h1>Malaysia Trip Registration Form</h1>
        <p>Enter your details to confirm your participation in the trip.</p>
        <?php
        if($insert == true) {
            echo "<p class='msg'>Thank you for filling out the Malaysia Trip Registration Form. We're excited to have you join us on this adventure!</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Type your message here"></textarea>
            <button class="btn">Submit</button>
           </form> 
    </div>
</body>
</html>