<?php
    include_once "config.php";
    session_start();

    $otp_code = mysqli_real_escape_string($conn,$_POST['otp']);

    if($otp_code != ""){
        $check_code = mysqli_query($conn,"SELECT * FROM users WHERE otp = {$otp_code}");
        if(mysqli_num_rows($check_code) > 0){
            $fetch_data = mysqli_fetch_assoc($check_code);
            $fetch_code = $fetch_data['otp'];
            $fetch_email = $fetch_data['email'];
            $code = 0;
            $verified = "verified";
            $update_otp = "UPDATE users SET otp = $code, verification = '$verified' WHERE otp = $fetch_code";
            $update_query = mysqli_query($conn, $update_otp);
            if($update_query){
                $_SESSION['verified'] = $verified;
                $_SESSION['unique_id'] = $fetch_data['unique_id'];
                echo "done";
            }else{
                echo "Error..!";
            }
        }else{
            echo "Invalid Code..Try Again!";
        }
    }else{
        echo "Enter the OTP!";
    }

?>
