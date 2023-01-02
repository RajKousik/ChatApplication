<?php
    session_start();
    include_once "config.php";
    $errors = array();
    // $_SESSION['email'] = "";

    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $check_email = "SELECT * FROM users WHERE email = '$email'";
            $run_sql = mysqli_query($conn, $check_email);
            if(mysqli_num_rows($run_sql) > 0){
                $code = rand(111111, 999999);
                $insert_code = "UPDATE users SET otp = $code WHERE email = '$email'";
                $run_query = mysqli_query($conn, $insert_code);
                if($run_query){
                    $subject = "Password Reset Code";
                    $message = "Your password reset code is $code";
                    
                    if(mail($email, $subject, $message)){
                        $_SESSION['email'] = $email;
                        header("Location: reset-code.php");
                    }else{
                        $errors['otp-error'] = "Failed while sending code!";
                    }
                }else{
                    $errors['other-error'] = "Something went wrong";
                }
            }else{
                $errors['db-error'] = "This email address does not have a account..!";
            }
        }else{
            $errors['email-error'] = "This is not a valid email";
        }
    }

    if(isset($_POST['check-reset-otp'])){
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE otp = $otp_code";
        $check_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($check_res) > 0){
            $fetch_data = mysqli_fetch_assoc($check_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            header("Location: new-password.php");
        }else{
            $errors['otp-error'] = "The code you entered is incorrect..!";
        }
    }

    if(isset($_POST['change-password']))
    {
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        // $email = $_SESSION['email'];
        if($password !== $cpassword)
        {
            $errors['p-error'] = "Confirm password not matched";
        }
        else
        {
            $code = 0;
            $email = $_SESSION['email'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $update_pass = "UPDATE users SET otp = $code, password = '$hashed_password' WHERE email = '$email' ";
            $run_pass = mysqli_query($conn, $update_pass);
            if($run_pass)
            {
                $_SESSION['email'] = $email;
                header("Location: password-changed.php");
            }
            else
            {
                $errors['update-error'] = "Failed to change your password...Please Try again!";
            }
        }
    }
?>