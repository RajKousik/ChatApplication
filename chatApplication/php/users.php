<?php

    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}"); //not showing users name in the list
    $output = "";

    if(mysqli_num_rows($sql) == 0){
        $output .= "No users are available to chat!";   //if it is only one row then he/she is the first person to signup this application
    }else if(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
 