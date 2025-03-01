<?php
include "functions.php";
?>
<html>
    <head>
        <title>Tweed Barbers</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <script src="jquery.validate.min.js"></script>
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
       
    </head>
    <body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="navbar">
                    <ul class="nav-items">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href='sherbimet.php'>SHËRBIMET</a></li>
                       <li><a href='stilet.php'>STILET</a></li>
                        <a href='index.php'>
                            <img src='images/tweedlogo.png' alt='Tweed Barbers' id='logo'>
                        </a>
                        <?php  if(isset($_SESSION['berberi'])){
                                echo "<li><a href='klientet.php'>KLIENTET</a></li>";
                                echo "<li><a href='rezervimet.php'>REZERVIMET</a></li>";
                            if($_SESSION['berberi']['roli'] == 1){
                                echo "<a href='index.php'>
                                <img src='images/tweedlogo.png' alt='Tweed Barbers' id='logo'>
                            </a>";
                            }
                            echo "<li><a id='dalja' href='index.php'>DALJA</a></li>";
                        } 
                        ?>
                        
                        <li><a href="login.php">LOGIN</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>