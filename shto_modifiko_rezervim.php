<?php

include "inc/header.php";

if (isset($_POST['shtorezervim'])) {
    shtoRezervim(
        $_POST['klienti'],
        $_POST['sherbimi'],
        $_POST['berberi'],
        $_POST['data']
    );
}

if (isset($_GET['rid'])) {
    $rezervimiid = $_GET['rid'];
    $rezervimi = merrRezervimId($rezervimiid);
    $sherbimid = $rezervimi['sherbimiid'];
    $sherbimemri = $rezervimi['emri'];
    $klintid = $rezervimi['klientiid'];
    $klintemrimbiemri = $rezervimi['emrimbiemri'];
    $berberid=$rezervimi['berberiid'];
    $berberemriMbiemri=$rezervimi['emriMbiemri'];
    $data=$rezervimi['data'];
    $data=date("Y-m-d",strtotime($data));
}
if (isset($_POST['modifikorezervim'])) {
    modifikoRezervim(
        $_POST['rezervimiid'],
        $_POST['klienti'],
        $_POST['sherbimi'],
        $_POST['berberi'],
        $_POST['data']
    );
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="images/res.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin/editimin e Rezervimit</h1>
        <br>
        <form method="POST">
            <div class="inputAndLabels">
                <input type="hidden" name="rezervimiid" value="<?php if(!empty($rezervimiid)) echo $rezervimiid ?>"
                <br>
                <label for="klienti">Klienti</label> <br>
                <select id="klienti" name="klienti">
                    <?php
                    //echo $_GET['rid'];
                    if (isset($_GET['rid'])) {
                        echo "<option value='$klintid'>$klintemrimbiemri</option>";
                    } else {
                        echo "<option value=''>Zgjedh Klientin </option>";
                    }
                    $klientet = merrKlientet();
                    while ($klienti = mysqli_fetch_assoc($klientet)) {
                        $klientiid = $klienti['klientiid'];
                        $klientiemrimbiemri = $klienti['emri'] . " " . $klienti['mbiemri'];
                        if (!empty($klintid)) {
                            if ($klintid != $klientiid) {
                                echo "<option value='$klientiid'> $klientiemrimbiemri</option>";
                            }
                        } else {
                            echo "<option value='$klientiid'> $klientiemrimbiemri</option>";
                        }
                        
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="sherbimi">Sherbimi</label> <br>
                <select id="sherbimi" name="sherbimi">
                    <?php
                    //echo $_GET['rid'];
                    if (isset($_GET['rid'])) {
                        echo "<option value='$sherbimid'>$sherbimemri</option>";
                    } else {
                        echo "<option value=''>Zgjedh Sherbimin </option>";
                    }
                    $sherbimet = merrSherbimet();
                    while ($sherbimi = mysqli_fetch_assoc($sherbimet)) {
                        $sherbimiid = $sherbimi['sherbimiid'];
                        $sherbimemri = $sherbimi['emri'];
                        if (!empty($sherbimid)) {
                            if ($sherbimid != $sherbimiid) {
                                echo "<option value='$sherbimiid'> $sherbimemri</option>";
                            }
                        } else {
                            echo "<option value='$sherbimiid'> $sherbimemri</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="berberi">Berberi</label></br>
                <select id="berberi" name="berberi">
                    <?php
                    //echo $_GET['rid'];
                    if (isset($_GET['rid'])) {
                        echo "<option value='$berberid'>$berberiemriMbiemri</option>";
                    } else {
                        echo "<option value=''>Zgjedh Berberin </option>";
                    }
                    $berberat = merrBerberat();
                    while ($berberi = mysqli_fetch_assoc($berberat)) {
                        $berberiid = $berberi['berberiid'];
                        $berberiemriMbiemri = $berberi['emri'] . " " . $berberi['mbiemri'];
                        if (!empty($berberid)) {
                            if ($berberid != $berberiid) {
                                echo "<option value='$berberiid'> $berberiemriMbiemri</option>";
                            }
                        } else {
                            echo "<option value='$berberiid'> $berberiemriMbiemri</option>";
                        }
                        
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="data">Data</label> <br>
                <input type="date" id="data" name="data"
                value="<?php if(!empty($data)) echo $data ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                    if (!isset($_GET['rid'])) {
                        echo "<input id='shtorezervim' type='submit'
                            name='shtorezervim' class='shtoModifiko' value='Shto Rezervim'>";
                    } else {
                        echo "<input id='modifikorezervim' type='submit'
                            name='modifikorezervim' class='shtoModifiko' value='Modifiko Rezervim'>";
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>

<php?
