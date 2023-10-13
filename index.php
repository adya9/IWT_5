<?php
$insert = false;
$server = "localhost";
$username = "root";
$password = "";

// Create a database connection
$con = mysqli_connect($server, $username, $password);

// Check for connection success
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}

if(isset($_POST['name'])){

    // Collect post variables
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $employee_type = $_POST['employee_type']; 
    $details_correct = $_POST['details_correct'];
    
    $sql = "INSERT INTO `employee`.`employee` (`id`,`name`, `age`, `gender`, `email`, `phone`,`employee_type`,`details_correct`) VALUES ('$id','$name', '$age', '$gender', '$email', '$phone','$employee_type','$details_correct');";
   
    // Execute the query
    if($con->query($sql) == true){
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
    <title>EMPLOYEE DETAILS</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
       <div class="container">
        <h1>!!Welcome!!</h1>
        <p>Please fill the form</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="id" id="id" placeholder="Enter your Employment ID" required>
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your Age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone" required>
            

            <select name="employee_type" id="employee_type" required>
                <option value="" disabled selected>Select Employee Type</option>
                <option value="Intern">Intern</option>
                <option value="Permanent">Permanent</option>
            </select>

            <div>
                <p>Are the details correct?</p>
                <!-- <input type="radio" name="details_correct" id="yes" value="Yes" required>
                <label for="yes">Yes</label>
                <input type="radio" name="details_correct" id="no" value="No" required>
                <label for="no">No</label> -->

                    <input type="radio" name="details_correct"  value="YES"required>YES
                    <input type="radio" name="details_correct" value="NO"required>NO
                    <!-- <input type="radio" name="details_correct" value="Other"required>Other -->
            </div>
          
            <button class="btn">Submit</button> 
           
        </form>
    </div>
      
</body>
</html>
