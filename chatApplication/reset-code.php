<?php
    require_once "php/change-password.php";
    $access = $_SESSION['email'];
    if(!isset($access)){
        header("Location: forgot-password.php");
    }
    
?>

<?php  include_once "header2.php"; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="reset-code.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <!-- <div class="alert alert-success text-center">
                        <p>We've send an OTP Code to your Email address</p>
                    </div> -->
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="alert alert-success text-center">
                                <p>We've sent an OTP Code to your Email address</p>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input type="number" name="otp" placeholder="Enter OTP" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="form-control button" name="check-reset-otp">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

