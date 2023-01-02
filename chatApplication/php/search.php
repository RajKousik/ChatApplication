<?php
    session_start();
    include "config.php";
    $outgoing_id = $_SESSION['unique_id'];

    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);       //get the search term from js/users.js file
    $output = "";

    //compare the searchTerm with database names
    $sql = mysqli_query($conn, " SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' ) ");
    if(mysqli_num_rows($sql) > 0){
        include "data.php";             //if found go to data.php file
    }else{
        $output .= "No user found related to your search term";
    }
    echo $output;

?>