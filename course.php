<!-- update and delete is left -->

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
        <a class="navbar-brand" href="#">Teachers Portal</a>
        </div>
        <ul class="nav navbar-nav">
        <li><a href="teacher_home.php">Home</a></li>
        <li class="active"><a href="course.php">Courses</a></li>
        <li><a href="#">Recent quizes</a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
  </nav>

  <div class="heading"> COURSES </div>
  <div class="container-courses">
    

  
    <?php
    if(isset($_SESSION['insert']))
    {
    $sql = "SELECT * FROM `courses`";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
      echo "<div class='addup-cont'><a href='quiz/createQuiz.php'><div class='course'>".$row['Name']. "</div></a>
            <button id='remove-btn' onclick='removeCourse()'> Remove </button>
            <button id='update-btn'> Update </button></div>";
    } 
      // <div class="course"> DBMS </div>
      // <div class="course"> OPERATING SYSTEM </div>
      // <div class="course"> JAVA </div>
  }
  
   else{
    $sql = "SELECT * FROM `courses`";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
      echo "<div class='addup-cont'><a href='quiz/createQuiz.php'><div class='course'>".$row['Name']. "</div></a>
          <button id='remove-btn' onclick='removeCourse()'> Remove </button>
          <button id='update-btn'> Update </button></div>";
    } 
  }

?>


      <button class="course"  onclick="addCourse()"> Add a course </button>
  </div>

  <div class="form-popup" id="myForm">
  <form action="addcourse.php" method="POST" class="form-container">
    <h1>Add a course</h1>

    <label for="c_id"><b>Course ID</b></label>
    <input type="text" placeholder="Enter Course ID" name="c_id" required>

    <label for="c_name"><b>Course Name</b></label>
    <input type="text" placeholder="Enter Course Name" name="c_name" required>

    <button type="submit" class="btn">ADD</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>


<script>
  function addCourse() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }

  function removeCourse() {
    deletes = document.getElementById('remove-btn');
      deletes.addEventListener("click", (e) => {
        console.log("edit ");
        // sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) 
        {
          console.log("yes");
          // window.location = `/crud/index.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else 
        {
          console.log("no");
        }
      })
    }
  


</script>
</body>
</html>