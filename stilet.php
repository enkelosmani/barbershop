<?php
    include "inc/header.php";
?>

<section class="list-entity container">
    <div class="image">
        <img src="images/styles.jpg" alt="">
    </div>
    <?php
    if (isset($_SESSION['mesazhi2'])) {
        echo "<div id='mesazhi2'>" . $_SESSION['mesazhi2'] . "</div>";
    }

    ?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Emri i Stilit</th>
                <th>Emri i Sherbimit</th>
                <th>Modifiko</th>
                <th>Fshij</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stilet = merrStilet();
            while ($stili = mysqli_fetch_assoc($stilet)) {
                $stiliid = $stili['stiliid'];
                echo "<tr class='active-row'>";
                echo "<td>" .  $stili['emri'] . "</td>";
                echo "<td>" .  $stili['emrisherbimit'] . "</td>";
                echo "<td><a href='shto_modifiko_stil.php?sid={$stiliid}'>
                <i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='fshij_stil.php?sid={$stiliid}'>
                <i class='far fa-trash-alt'></i></a></td>";
                echo "</tr>";
                echo "</tr>";
            }

            ?>

        </tbody>
    </table>
    <a href="shto_modifiko_stil.php" id="add_entity"><i class="add_entity fas fa-plus"></i> Shto Stil</a>
</section>
</body>

</html>
            
<?php/*
include "inc/footer.php";
?>