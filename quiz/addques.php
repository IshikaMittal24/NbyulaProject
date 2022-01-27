<?php

    session_start();
    include 'C:\xampp\htdocs\NbyulaProject\connect.php';

    $insert=false;

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
    {
        header("location: teacher-login.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (isset( $_POST['ques']))
        {
            //Insert the record
            $question = $_POST["ques"];
            $ans = $_POST["ans"];

            //echo $question. " " . $ans  ;
            //print_r($data);
            //die();

            $sql = "INSERT INTO `questions`(`ques`, `ans_id`) VALUES ('$question','$ans')";
            $result = mysqli_query($con,$sql);

            $sql = "SELECT * FROM `questions` WHERE `ques`='$question'";
            $result = mysqli_query($con,$sql);
            //echo $result;
            $data = mysqli_fetch_array($result);
            $qid = $data['qid'];
            
            /*echo $qus_id;

            echo "<pre>";
            print_r($option);
            echo "</pre>";

            ?id='.$mselcted_memberI
            $option = $_POST['opt'];*/


            for($i = 0; $i < count($_POST['option']); $i++) 
            {
                //echo $_POST['id'][$i] . "<br>";

                $sql = "INSERT INTO `answers`(`answer`, `qid`) VALUES ('".$_POST['option'][ $i ]."', '$qid')";
                $result = mysqli_query($con,$sql);
            }


            if($result)
            { 
                //$insert = true;
                $_SESSION['insert'] = true;
                header("location : createQuiz.php");
            }
            else
            {
                echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            } 
        }
    }
?>