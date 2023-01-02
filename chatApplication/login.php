<?php
    session_start();
    if(isset($_SESSION['unique_id'])){   //if it is already logged in user try to login in new tab...show the php file
        header("location: users.php");
    }
?>


<?php  include_once "header.php"; ?>

<body>
    
    <div class="wrapper">
        <section class="form login">
            <header>RealTime Chat Application</header>
            <form action="#" autocomplete="off">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" id="pwd" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye" id="pwdEye"></i>
                </div>
                <a href="forgot-password.php" class="forgot">Forgot Password?</a>
                <div class="field button">
                    <input type="submit" value="Start to Chat">
                </div>
            </form>
            <div class="link">Don't have an Account? <a href="index.php">SignUp Here</a></div>
        </section>
    </div>
    <?php
            include_once "../time/index.php";
    ?>

    <!-- Script Connection -->
    <script src="javascript/pass-showHide.js"></script>
    <script src="javascript/login.js"></script>

</body>
</html>