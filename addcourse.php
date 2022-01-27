<?php

    session_start();
    include 'connect.php';

    $insert=false;

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
    {
        header("location: teacher-login.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (isset( $_POST['c_id']))
        {
          //Insert the record
            $cid = $_POST['c_id'];
            $cname = $_POST['c_name'];

            $sql = "INSERT INTO `courses` (`c_id`, `Name`, `q_id`) VALUES ('$cid', '$cname', 'NULL')";
            $result = mysqli_query($con, $sql);
         
          if($result)
          { 
            //   $insert = true;
            $_SESSION['insert'] = true;
              header("location : course.php");
          }
          else
          {
              echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
          } 
        
          // Sql query to be executed
        //   $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`sno` = $sno";
        //   $result = mysqli_query($conn, $sql);
        //   if($result)
        //   {
        //     $update = true;
        //   }
        //     else
        //     {
        //         echo "We could not update the record successfully";
        //     }
        // }
        // else
        // {
        //     $title = $_POST["title"];
        //     $description = $_POST["description"];
        
        //   // Sql query to be executed
          
        // }
        }
    }
?>