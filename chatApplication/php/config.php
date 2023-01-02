<?php

    $conn = mysqli_connect("localhost","root","welC0me$","chatApp");        //connecting the database
    if(!$conn){
        echo "Database not connected" . mysqli_connect_error();
    }

?>