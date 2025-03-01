<?php

include "inc/header.php";

if(isset($_GET['shid'])){
    $sherbimiid=$_GET['shid'];
    $sherbimi=merrSherbimiId($sherbimiid);
    $emri=$sherbimi['emri'];
    $kostoja=$sherbimi['kostoja'];
}
if(isset($_POST['fshij'])){
    fshijSherbim($sherbimiid);
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
                <label for="kostoja">Kostoja</label> <br>
                <input type="number" id="kostoja" name="kostoja"
                value="<?php if(!empty($kostoja)) echo $kostoja ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="fshij" name="fshij" class="shtoModifiko" value="Fshij">
                </div>
            </div>
            <div class="inputAndLabels">
                    <div class="butonat">
                    <?php
                    if (!isset($_GET['shid'])) {
                        echo "<input id='fshijsherbim' type='submit'
                            name='fshijsherbim' class='shtoModifiko' value='Fshij Sherbim'>";
                    } 
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>