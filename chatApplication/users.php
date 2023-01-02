
<?php

    session_start();
    if(!isset( $_SESSION['unique_id'])){        //if user try to access this file directly..then go to login php file
        header("location: login.php");
    }
    if(isset($_SESSION['unique_id'])){
        include_once "php/config.php";
        $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_assoc($query);
            $status = $data['verification'];
            if($status != "verified"){
                header("location: otppage.php");
            }
        }
    }
?>


<?php  include_once "header.php"; ?>

<body>
    
    <div class="wrapper">
        <section class="users">
            <header>
            <?php
                include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql)){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
                <div class="content">
                    <img src="php/images/<?php echo $row['img'] ?>" alt="">         <!--fetch the image from the database -->
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>     <!--fetch the name from the database -->
                        <p><?php echo $row['status']; ?></p>                    <!--fetch the status from the database -->
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>   <!--if logged out clicked go to logout file with user's id-->
            </header>
            <div class="search">
                <span class="text">Select an user to start Chat</span>
                <input type="text" placeholder="Search here...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                <!-- Content comes from javascript/users.js and php/users php file -->
            </div>
        </section>
    </div>

    <!-- JS Connection -->
<script src="javascript/users.js"></script>

</body>
</html>