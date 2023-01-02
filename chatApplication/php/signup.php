<?php

    session_start();
    include_once "config.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($cpassword))
    {
        if(strlen($fname) <= 10)
        {
            if(strlen($lname) <= 10)
            {
                if($password === $cpassword)
                {
                    //checking email
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        //check if email is already registered in dbms
                        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
                        if(mysqli_num_rows($sql) > 0)
                        {
                            echo "$email - This email already exist";
                        }
                        else
                        {
                            //lets do password validation
                            
                            $uppercase = preg_match('@[A-Z]@', $password);
                            $lowercase = preg_match('@[a-z]@', $password);
                            $number    = preg_match('@[0-9]@', $password);
                            $specialChars = preg_match('@[^\w]@', $password);

                            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
                            {
                                echo "The Password should contain atleast 8 characters, one uppercase, one lowercase, one number and one symbol";
                            }
                            else
                            {
                                // 
                                if(isset($_FILES['image']))
                                {
                                    $img_name = $_FILES['image']['name']; //getting image name
                                    $tmp_name = $_FILES['image']['tmp_name']; //getting temporary name of the file, used to move file in our folder

                                    //exploading image and getting the extension
                                    $img_expolde = explode('.', $img_name);
                                    $img_ext = end($img_expolde);

                                    $extensions = ['png','jpeg','jpg']; //valid file types
                                    if(in_array($img_ext, $extensions) === true)
                                    {
                                        $time = time(); //thi will return current time whiich is used in name of the file so each file has unique name

                                        //movng file to our folder
                                        $new_img_name = $time . $img_name;

                                        if(move_uploaded_file($tmp_name, "images/".$new_img_name))
                                        { 
                                            //if image is save in our folder
                                            $status = "Active Now";
                                            $random_id = rand(time(),10000000);
                                            $code = rand(111111,999999);
                                            $verification = "not verified";

                                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                                            //inserting in database
                                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status, verification, otp)
                                                                        VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$hashed_password}', '{$new_img_name}', '{$status}', '{$verification}', {$code})");

                                            if($sql2)
                                            {  

                                                //if inserted successfully
                                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
                                                if(mysqli_num_rows($sql3) > 0)
                                                {
                                                    $row = mysqli_fetch_assoc($sql3);
                                                    
                                                    //$_SESSION['unique_id'] = $row['unique_id'];     //using session unique_id is stored so it can be used in other files
                                                    
                                                    $subject = "Email Verification Code";
                                                    $message = "Your verification Code is $code";
                                                    $sender = "From: chatApplication@gmail.com";

                                                    if(mail($email, $subject ,$message, $sender))
                                                    {
                                                        echo "done";
                                                    }
                                                    else
                                                    {
                                                        echo "Something went wrong!";
                                                    } 
                                                }
                                            }
                                            else
                                            {
                                                echo "Something went wrong!";
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo "Please Uplaod A Image File - jpeg, png, jpg";
                                    }
                                }
                                else
                                {
                                    echo "Please Uplaod A Image File!";
                                }
                                // 
                            }
                        }
                    }
                    else
                    {
                        echo "$email - This is not a valid Email!";
                    }
                }
                else
                {
                    echo "confirm Password not matched";
                }
            }
            else
            {
                echo "Please Give a Short Last Name";
            }
        }
        else
        {
            echo "Please Give a Short First Name";
        }
    }
    else
    {
        echo "All input field are required!";
    }

?>