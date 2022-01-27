<?php
    session_start();

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="teacher_home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Merriweather:wght@300&family=Source+Serif+4:wght@200;300;400&display=swap" rel="stylesheet">

    <title>Home</title>
</head>
<body>

    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">Teachers Portal</a>
        </div>
        <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="course.php">Courses</a></li>
        <li><a href="#">Recent quizes</a></li>
        <li><a href="logout.php">LogOut</a></li>
        </ul>
    </div>
    </nav>

    <div class="center">
        <p class="entry">Welcome to our portal</p>
        <p>1. Here you will be able to add, remove, edit or delete courses</p>
        <p>2. Also you will be able to create a quiz for each course and evaluate the students.</p>
    </div>

</body>
</html>