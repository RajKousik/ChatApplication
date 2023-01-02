<?php
    session_start();
    if(isset($_SESSION['unique_id'])){              //if it is already logged user try to login in new tab...show the php file
        header("location: users.php");
    }
?>


 <?php  include_once "header.php"; ?> 

<body>
    
    <div class="wrapper">
        <section class="form signup">
            <header>RealTime Chat Application</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                <div class="flex">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
               <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="flex">
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" id="pwd" name="password" placeholder="Password" required>
                        <i class="fas fa-eye" id="pwdEye"></i>
                    </div>
                    <div class="field input">
                        <label>Re-type Password</label>
                        <input type="password" id="confirm" name="cpassword" placeholder="Confirm" required>
                        <i class="fas fa-eye" id="confirmEye"></i>
                    </div>
                </div>
                <div class="field image">                                                       
                    <label for="formFile" class="form-label">Upload Your Profile</label>
                    <input class="form-control" name="image" type="file" id="formFile" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Start to Chat">
                </div>
            </form>
            <div class="link">Already Signed Up? <a href="login.php">Login Here</a></div>
        </section>
    </div>

    <?php
            include_once "../time/index.php";
    ?>

    <!-- Script Connection -->
    <script src="javascript/pass-showHide.js"></script>
    <script src="javascript/signUp.js"></script>

</body>
</html>