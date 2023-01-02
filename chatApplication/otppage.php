<?php
    session_start();
    if(isset($_SESSION['verified'])){
    if($_SESSION['verified'] == "verified"){
        header("Location: users.php");
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>OTP VERIFICATION</title>

    <style>
        body{
            display:flex;
            align-items:center;
            justify-content:center;
            min-height:100vh;
            background: #6665ee;
        }
        form{
            background: #fff;
            padding: 30px 35px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 
                        0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .form-control{
            height: 40px;
            font-size: 15px;
        }
        .button{
            background: #6665ee;
            color: #fff;
            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .button:hover{
            background: #5757d1;
        }
        .alert{
            font-size: 18px;
            padding-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="#" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <div class="alert alert-success text-center">
                        <p>We have sent an verification code to your mail</p>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control button" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="javascript/otp.js"></script>
</body>
</html>