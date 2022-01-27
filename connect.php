<?php

    $server = "localhost:3307";
    $username = "root";
    $pass = "";
    $dbname = "nbyulaproject";

    $con = mysqli_connect($server, $username, $pass, $dbname);

    if(!$con)
    {
        die("Failed to Establish Database Connection due to : ".mysqli_connect_error());
    }
    // else{
    //     echo "Successfully connected";
    // }

?>