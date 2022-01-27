<?php
    session_start();
    include 'C:\xampp\htdocs\NbyulaProject\connect.php';

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
    {
        header("location: teacher-login.php");
        exit;
    }
?>

<style>
    .heading{
        font-size: 4em;
        font-family: 'Times New Roman', Times, serif;
        display: block;
        width: 80%;
        text-align: center;
        margin: auto;
    }
    .container{
        width: 80%;
        margin: auto;
        text-align: center;
        padding: 25px;
        /* border: 2px solid red; */
    }
    .add-btn{
        padding: 5px;
    }
    .quiz-cont{
        width: 60%;
        margin: 10px auto;
        padding: 5px;
        border 2px solid yellow;
    }
    .form-popup {
    display: none;
    margin-left: 41%;
    width: fit-content;
    /* position: fixed; */
    /* bottom: 0; */
    /* right: 15px; */
    border: 3px solid #f1f1f1;
    /* z-index: 9; */
     }
  
    /* Add styles to the form container */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }
    
    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }
    
    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }
    
    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
    }
    
    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }
    
    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
        opacity: 1;
    }
    
    button:hover {
        opacity:1;
    }
    
    /* Float cancel and delete buttons and add an equal width */
    .cancelbtn, .deletebtn {
        /* float: left; */
        width: 35%;
        padding: 1%;
        margin: 1%;
    }
    
    /* Add a color to the cancel button */
    .cancelbtn {
        background-color: #ccc;
        color: black;
    }
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
</head>
<body>
    <div class="heading">QUIZ</div>
    <div class="container">
        <button class="add-btn" onclick="openForm()"> Add question </button>
    </div>

    <div class="form-popup" id="myForm">
        <form action="addques.php" method="POST" class="form-container">
            <h1>Add a question</h1>

            <label for="ques"><b>Enter question</b></label>
            <input type="text" placeholder="" name="ques" required>

            <label for="options"><b>options</b></label>
            <input type="text" placeholder="Option1" name="option[]" required>
            <input type="text" placeholder="Option2" name="option[]" required>
            <input type="text" placeholder="Option3" name="option[]" required>
            <input type="text" placeholder="Option4" name="option[]" required>

            <label for="ans"><b>Enter answer</b></label>
            <input type="text" placeholder="" name="ans" required>

            <button type="submit" class="btn">ADD</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <form action="checked.php" method="POST" class="quiz-cont">
        <div class="quiz-ques">

            <?php       
                for($i=1;$i<=10;$i++)
                {
                    $l = 1;
                  
                    $ansid = $i;

                    $sql1 = "SELECT * FROM `questions` WHERE `qid` = $i ";
                 	$result1 = mysqli_query($con, $sql1);
             		if (mysqli_num_rows($result1) > 0) 
                    {
             			while($row1 = mysqli_fetch_assoc($result1)) 
                        {
            ?>				
                            <br>
                            <div class="card">
                            <br>
                            <p class="card-header">  
                                <?php echo $i ." : ". $row1['ques']; ?> 
                            </p>
                    
            <?php
                            $sql = "SELECT * FROM `answers` WHERE `qid` = $i";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) 
                            {
                                while($row = mysqli_fetch_assoc($result)) 
                                {
            ?>	
                                        <input type="radio" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['ans_id']; ?>">
                                        <?php echo $row['answer']; ?> 
                                        <br>
                                    
            <?php
                        
                                } 
                            } 
                            $ansid = $ansid + $l;
                        } 
                    }
                }
            ?>
            <br>
                  <input type="submit" name="submit" Value="Submit" class="btn btn-success m-auto d-block" /> <br>
        </div>
    </form>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }
        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
</body>
</html>