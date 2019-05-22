<!DOCTYPE HTML>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
	
	
    //1. define variables and set to empty values
    $first_name = $last_name = $email = $gender = $age = $adress = $phone_number = $password = "";
	
	//2. Establish connection to database
      include "connection.php";
	
   //3. Get form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = test_input($_POST["first_name"]);
        $last_name = test_input($_POST["last_name"]);
        $email = test_input($_POST["email"]);
        $gender = test_input($_POST["gender"]);
        $age = test_input($_POST["age"]);
		$adress = test_input($_POST["adress"]);
		$phone_number = test_input($_POST["phone_number"]);
		$password = test_input($_POST["password"]);
		$og_password = $password;
		//encrpting
		$password = hash("sha512", $password);	
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
        var_dump($password);
		echo "<br>";
        var_dump($hashed_password);
		

		

		
		//4. Set db query
		$sql = "INSERT INTO `persons` (`PersonID`, `FirstName`, `LastName`, `Email`, `Gender`, `Age`, `Address`, `PhoneNumber`, `Password`)   
		VALUES  (NULL, '$first_name', '$last_name', '$email', '$gender', '$age', '$adress', '$phone_number', '$hashed_password')";
		//5. run query
		if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully!";
            header("location:login.php");
		} else {
			echo "Error inserting data: " . $conn->error;
		}
        //6. close db connection
		$conn->close();
		
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div class="container">
        <h1>REGIATRATION FORM</h1>
        <form method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
            <div class="form-group">
                <label for="firstname">FirstName:</label>
                <input type="text" placeholder="FirstName" name="first_name">
            </div>
            <div class="form-group">
                <label for="email">LastName:</label>
                <input type="mail" placeholder="LastName" name="last_name">
            </div>

            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="mail" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <label for="email">Gender:</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="M">Male
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="F">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" placeholder="Age" name="age">
            </div>
			<div class="form-group">
                <label for="adress">Adress:</label>
                <input type="text" placeholder="Adress" name="adress">
            </div>
			
            <div class="form-group">
                <label for="phone_number">PhoneNumber:</label>
                <input type="text" placeholder="PhoneNumber" name="phone_number">
            </div>
			 <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" placeholder="" name="password">
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-danger">

        </form>
    </div>

    <?php
    echo "<h2>Your Input:</h2>";
    echo $first_name;
    echo "<br>";
    echo $last_name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $gender;
    echo "<br>";
    echo $age;
	echo "<br>";
	echo $adress;
	echo "<br>";
	echo $phone_number;
	echo "<br>";
	echo $og_password;
	echo "<br>";
	echo $hashed_password;
	echo "<br>";
			/* verifying (never decrypts) */

		$verify = hash('sha512', $og_password);
		var_dump($verify);
		$verify = password_verify($verify, $hashed_password);
		var_dump($verify);
    ?>