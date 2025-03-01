<?php

include "inc/header.php";

if (isset($_GET['kid'])) {
    $klientiid = $_GET['kid'];
    $klienti = merrKlientId($klientiid);
    $emri = $klienti['emri'];
    $mbiemri = $klienti['mbiemri'];
    $email = $klienti['email'];
    $telefoni = $klienti['telefoni'];
}   

if (isset($_POST['shtoklient'])) {
    shtoklient(
        $_POST['emri'],$_POST['mbiemri'],
        $_POST['email'],$_POST['telefoni']
        
    );
}
if (isset($_POST['modifikoklient'])) {
    modifikoKlient($klientiid,
        $_POST['emri'],$_POST['mbiemri'],
        $_POST['email'],$_POST['telefoni']
    );
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="images/clients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin/modifikimin e Klientit</h1>
        <br>
        <form method="post">

            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" value="<?php if (!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input type="text" id="mbiemri" name="mbiemri" value="<?php if (!empty($mbiemri)) echo $mbiemri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input type="email" id="email" name="email" value="<?php if (!empty($email)) echo $email ?>">
            </div>
            <div class="inputAndLabels">
                <label for="telefoni">Nr telefonit</label> <br>
                <input type="text" id="telefoni" name="telefoni" value="<?php if (!empty($telefoni)) echo $telefoni ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                    if (!isset($_GET['kid'])) {
                        echo "<input id='shtoklient' type='submit'
                            name='shtoklient' class='shtoModifiko' value='Shto Klient'>";
                    } else {
                        echo "<input id='modifikoklient' type='submit'
                            name='modifikoklient' class='shtoModifiko' value='Modifiko Klient'>";
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>