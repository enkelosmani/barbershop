<?php

include "inc/header.php";

if(isset($_GET['sid'])){
    $stiliid=$_GET['sid'];
    $stili=merrStiliId($stiliid);
    $emri=$stili['emri'];
    $sherbimiid=$stili['sherbimi'];
}
if(isset($_POST['fshij'])){
    fshijStil($stiliid);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="images/styles.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin/modifikimin e Klientit</h1>
        <br>
        <form action="#" method="POST">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri"
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="sherbimi">Sherbimi</label> <br>
                <select id="sherbimi" name="sherbimi">
                    <?php
                    //echo $_GET['rid'];
                    if (isset($_GET['rid'])) {
                        echo "<option value='$sherbimiid'>$sherbimiemri</option>";
                    } else {
                        echo "<option value=''>Zgjedh Sherbimin </option>";
                    }
                    $sherbimet = merrSherbimet();
                    while ($sherbimi = mysqli_fetch_assoc($sherbimet)) {
                        $sherbimiid = $sherbimi['sherbimiid'];
                        $sherbimiemri = $sherbimi['emri'];
                        if (!empty($sherbimiid)) {
                            if ($sherbimiid != $sherbimiemri) {
                                echo "<option value='$sherbimiid'> $sherbimiemri</option>";
                            }
                        } else {
                            echo "<option value='$sherbimiid'> $sherbimiemri</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="fshij" name="fshij" class="shtoModifiko" value="Fshij">
                </div>
            </div>
            <div class="inputAndLabels">
                    <div class="butonat">
                    <?php
                    if (!isset($_GET['sid'])) {
                        echo "<input id='fshijstil' type='submit'
                            name='fshijstil' class='shtoModifiko' value='Fshij Stil'>";
                    } 
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>