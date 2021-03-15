<!-- 
    To build a Library Management System in MVC framework
    Main features: Login, Register, Search
    Number of database used: 3
    @author: Sung
    @version: 23 August 2019
 -->

 <?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
    <script src="Shared/Validation.js"></script>
    <script src="https://code.jquery.com/jquery-latest.min.js" 
        integrity="sha384-UM1JrZIpBwVf5jj9dTKVvGiiZPZTLVoq4sfdvIe9SBumsvCuv6AHDNtEiIb5h1kU" 
        crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Management System</title>
</head>
<body style="background-color: #f4feff; margin:0; overflow:hidden">

<center/>
<h1>Welcome to Library Management System</h1>

<!-- Top Nagivation Bar -->
<header style="border: 1px solid black; width: 100%">
    <nav>
        <form id = "nav-form" method="post">
            <?php 
                if(isset($_SESSION['login']) && $_SESSION['login'] === true){?>
                <input 
                    class="nav-button after-login"
                    type="submit"
                    name="switch-tab"
                    value="Search"/>
                <input 
                    class="nav-button after-login"
                    type="submit"
                    name="switch-tab"
                    value="Logout"/>
            <?php }else {?>
                <input 
                    class="nav-button before-login"
                    type="submit"
                    name="switch-tab"
                    value="Login"/>
                <input 
                    class="nav-button before-login"
                    type="submit"
                    name="switch-tab"
                    value="Register"/>
            <?php }?>
        </form>
    </nav>
    <style>
    @media only screen{
        #nav-form{
            position:absolute;
            width:100%;
        }
        .nav-button{
            background-color: lightgray;
            width:40%;
            font-size:15pt;
            outline:none;
            border-radius: 10px;
            border: 1px solid black;
        }
        .nav-button:hover{
            box-shadow: 0 2px black;
            cursor:pointer;
        }
        .nav-button:active{
            background-color: white;
            box-shadow: 0 2px gray;
        }
    }
    </style>
</header>

<main>
<?php
   require_once(__DIR__."/Controller/Controller.php");
   $controller = new Controller();  
   echo $controller->execute();
?>
</main>
    
<script>
</script>
<style>
</style>
</body>
</html>
