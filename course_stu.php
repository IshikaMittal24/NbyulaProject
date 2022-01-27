<?php

    session_start();
    include 'connect.php';

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
    {
        header("location: teacher-login.php");
        exit;
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="course.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Courses</title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">Student Portal</a>
        </div>
        <ul class="nav navbar-nav">
        <li><a href="student_home.php">Home</a></li>
        <li class="active"><a href="course_stu.php">Courses</a></li>
        <li><a href="#">Quizes</a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
  </nav>

    <div class="heading"> COURSES </div>
    <div class="container-courses">
    

  
        <?php

                $sql = "SELECT * FROM `courses`";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
                echo "<div class='addup-cont'><div class='course'>".$row['Name']. "</div>";
                } 

        ?>
    
        <button class="course"  onclick="addCourse()"> Add a course </button>
    </div>

<script></script>

</body>
</html>