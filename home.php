<?php
session_start();

 $person_id = $_SESSION["PersonID"];
 $first_name = $_SESSION["FirstName"];
 $last_name = $_SESSION["LastName"];
 $email = $_SESSION["Email"];

?>


<!DOCTYPE html>
<html>
<head>
<title>Welcome Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">  
    <div class="jumbotron">
        Welcome <?php echo $first_name." ".$last_name ;  ?>
    </div>   
    <a href = "logout.php">logout</a>     
</div>
</body> 
</html>

