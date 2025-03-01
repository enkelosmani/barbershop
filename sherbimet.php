<?php
    include "inc/header.php";
?>

<section class="list-entity container">
    <div class="image">
        <img src="images/services.jpg" alt="">
    </div>
    <?php
    if (isset($_SESSION['mesazhi3'])) {
        echo "<div id='mesazhi3'>" . $_SESSION['mesazhi3'] . "</div>";
    }

    ?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Emri</th>
                <th>Kostoja</th>
                <th>Modifiko</th>
                <th>Fshij</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sherbimet = merrSherbimet();
            while ($sherbimi = mysqli_fetch_assoc($sherbimet)) {
                $sherbimiid = $sherbimi['sherbimiid'];
                echo "<tr class='active-row'>";
                echo "<td>" .  $sherbimi['emri'] . "</td>";
                echo "<td>" .  $sherbimi['kostoja'] . "</td>";
                echo "<td><a href='shto_modifiko_sherbim.php?shid={$sherbimiid}'>
                <i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='fshij_sherbim.php?shid={$sherbimiid}'>
                <i class='far fa-trash-alt'></i></a></td>";
                echo "</tr>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
    <a href="shto_modifiko_sherbim.php" id="add_entity"><i class="add_entity fas fa-plus"></i> Shto Sherbim</a>
</section>
</body>

</html>
            
<?php/*
include "inc/footer.php";
?>