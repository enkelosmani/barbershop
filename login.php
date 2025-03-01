<?php
include "inc/header.php";

if(isset($_POST['login'])){
    //print_r($_POST);
    login($_POST['email'],$_POST['fjalekalimi']);
}

?>
    
<body id="loginPage">
<div class="loginForma container">
    <div class="formaLogin">
        <h1>Login</h1>
        <form method="POST">
            <div>
                <input name="email" type="text" placeholder="email"> <br>
                <input name="fjalekalimi" type="password" placeholder="password">
            </div>

            <div class="loginFormFooter">
                <span>Nuk keni akoma account? <br> <a href="regjistrohu.php">Regjistrohu</a></span> <br>
                <input type="submit" id="login" name="login" value='Login'>
            </div>
        </form>
    </div>
</div>

</body>
</html>
