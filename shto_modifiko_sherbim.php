<?php

include "inc/header.php";
if (isset($_GET['shid'])) {
    $sherbimiid=$_GET['shid'];
    $sherbimi=merrSherbimiId($sherbimiid);
    $emri=$sherbimi['emri'];
    $kostoja=$sherbimi['kostoja'];
}
if(isset($_POST['shtosherbim'])){
    shtosherbim($_POST['emri'],$_POST['kostoja']);
}
if(isset($_POST['modifikosherbim'])){
   modifikosherbim($sherbimiid,$_POST['emri'],$_POST['kostoja']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="images/services.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin/modifikimin e Sherbimit</h1>
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
                    <?php
                    if (!isset($_GET['shid'])) {
                        echo "<input id='shtosherbim' type='submit'
                            name='shtosherbim' class='shtoModifiko' value='Shto Sherbim'>";
                    } else {
                        echo "<input id='modifikosherbim' type='submit'
                            name='modifikosherbim' class='shtoModifiko' value='Modifiko Sherbim'>";
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>