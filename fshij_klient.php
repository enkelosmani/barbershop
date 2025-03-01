<?php

include "inc/header.php";


if(isset($_GET['kid'])){
    $klientiid=$_GET['kid'];
    $klienti=merrKlientId($klientiid);
    $emri=$klienti['emri'];
    $mbiemri=$klienti['mbiemri'];
    $email=$klienti['email'];
    $telefoni=$klienti['telefoni'];
   
}
if(isset($_POST['fshij'])){
    fshijKlient($klientiid);
}


?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="images/services.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e sherbimit</h1>
        <br>
        <form action="#" method="POST">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri"
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input type="text" id="mbiemri" name="mbiemri"
                value="<?php if(!empty($mbiemri)) echo $mbiemri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input type="text" id="email" name="email"
                value="<?php if(!empty($email)) echo $email ?>">
            </div>
            <div class="inputAndLabels">
                <label for="telefoni">Telefoni</label> <br>
                <input type="text" id="Telefoni" name="telefoni"
                value="<?php if(!empty($telefoni)) echo $telefoni ?>">
            </div>
            <div class="inputAndLabels">
                    <div class="butonat">
                    <?php
                    if (!isset($_GET['kid'])) {
                        echo "<input id='fshijklient' type='submit'
                            name='fshijklient' class='shtoModifiko' value='Fshij Klient'>";
                    } 
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>