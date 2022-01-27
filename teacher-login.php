
<?php

	$login = false;
	$showError = false;
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include 'connect.php';
	
		$id = $_POST['tchrid'];
		$password = $_POST['tpass'];
		// echo $password;
		// $hash = password_hash($password, PASSWORD_DEFAULT);
		// echo $hash;
		
		// echo $id. "  ". $password;

		if(isset($id) && isset($password))
		{
			// echo "hello";
			$sql = "Select * from `nbyulaproject`.`teachers` where Id ='$id'";
			$result = mysqli_query($con, $sql);
    		$num = mysqli_num_rows($result);

    		if ($num == 1)
			{
						$login = true;
						session_start();
						$_SESSION['loggedin'] = true;
						$_SESSION['id'] = $id;
						header("location: teacher_home.php");
            } 
            		else
					{
						// echo "Invalid Credentials";
                		$showError = "Invalid Credentials";
            		}
        
    	} 
    	else
		{
			echo "Invalid Credentials";
    		// $showError = "Invalid Credentials";    		
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
    <title>Login-Teacher</title>
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
                    <form action="teacher-login.php" method="post">
                        <div class="login">
                            TEACHER LOGIN
                        </div>
                        <div class="login login-id">
							<label for="tchrid">Enter ID :</label>
                            <input type="number" name="tchrid" required> <br>
                        </div>
                        <div class="login login-id">
							<label for="tpass"> Enter Password :</label>
                            <input type="password" name="tpass" required>
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