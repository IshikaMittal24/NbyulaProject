<?php
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
	{
        include 'connect.php';

		$rollno = $_POST["stuid"];
		$password = $_POST["spass"];

        // echo $rollno;
        // echo $password;

        $sql = "Select * from student where RNo = '$rollno' AND password = '$password'";
		$result = mysqli_query($con, $sql);
    	$num = mysqli_num_rows($result);

            if ($num == 1)
			{
				$login= true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['rollno'] = $rollno;
                header("location: student_home.php");
    		} 
    		else
			{
				// echo "Invalid Credentials";
        		$showError = "Invalid Credentials";
    		}
	}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teacher.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Source+Serif+4:wght@200;300;400&display=swap" rel="stylesheet">
    <title>Login-Student</title>
</head>
<body>

<?php
    if($login){
    echo '<strong>Success!</strong> You are logged in';
    }
    if($showError){
    echo '<strong>Error!</strong> '. $showError.' ';
    }
?>

    <div class="main-cont">
        <div class="container">
            <div class="img-cont">
                <div class="logo">
                    <img src ="images/logo-removebg-preview.png">
                </div>
                
                <div class="login-cont">
                    <form action="student-login.php" method="post">
                        <div class="login">
                            STUDENT LOGIN
                        </div>
                        <div class="login login-id">
                            Enter ID :<br>
                            <input type="text" name="stuid" required> <br>
                        </div>
                        <div class="login login-id">
                            Enter Password :<br>
                            <input type="password" name="spass" required>
                        </div>
                        <div class="login">
                            <input id="submit" type="submit">
                        </div>
                    </form>   
                </div>
            </div>
        </div>
    </div>
</body>
</html>