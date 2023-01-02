<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot-Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<style>
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: #6665ee;
        box-sizing: border-box;
    }
    form{
        padding: 30px 35px;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 
                    0 6px 20px 0 rgba(0, 0, 0, 0.19);
        width: 450px;
        background-color: rgb(255,255,255);
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
    .alert-success{
        font-size: 18px;
        padding: 0 10px;
    }
    .alert p{
        position: relative;
        top: 7px;
    }
    .alert{
        font-weight: 500;
    }
    .form form #pass i{
        position: absolute;
        right: 15px;
        color: #ccc;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .form form #pass i.active::before{
        color: #333;
        content: "\f070";
    }
    #pass{
        position: relative;
    }
</style>