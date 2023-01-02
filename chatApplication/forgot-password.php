<?php
    require_once "php/change-password.php";
?>

<?php  include_once "header2.php"; ?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="forgot-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Forgot Password</h2>
                    
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
                            <div class="alert alert-primary text-center">
                                <p class="text-center">No Worries! You can reset your password</p>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input type="email" class="form-control"name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Continue" class="form-control button" name="check-email">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>