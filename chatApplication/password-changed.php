<?php  include_once "header2.php"; ?>
<?php 
    require_once "php/change-password.php";
    $access = $_SESSION['email'];
    if(!isset($access)){
        header("Location: forgot-password.php");
    }
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="login.php" method="POST" autocomplete="off">
                    <div class="alert alert-success text-center">
                        <p>Your password has been updated</p>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login Now" name="login now" class="form-control button">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>