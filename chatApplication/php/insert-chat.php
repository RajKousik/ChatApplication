<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);     //sender's unique_id
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);     //receiver's unique_id
        $message = mysqli_real_escape_string($conn, $_POST['message']);             //the message

        // -- //
        date_default_timezone_set("Asia/Kolkata");
        $tempdate = date("l");
        $day = substr($tempdate,0,3);

        $time = date("h:i a");
        $msgTime = $day . " " . $time;

        //---//

        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages(incoming_msg_id, outgoing_msg_id, msg, msg_time)
                                VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '{$msgTime}') ") or die();

        }

    }
    else{
        header("../login.php");
    }

?>