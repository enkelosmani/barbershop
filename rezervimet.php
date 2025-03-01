<?php
include "inc/header.php";

?>

<section class="list-entity container">
    <div class="image">
        <img src="images/res.jpg" alt="">
    </div>
    <?php
    if(isset($_SESSION['mesazhi4'])){
        echo "<div id='mesazhi4'>" . $_SESSION['mesazhi4'] . "</div>";
    }
    
    ?>
        <table class="styled-table">
        <thead>
        <tr>
            <th>Klienti</th>
            <th>Sherbimi</th>
            <th>Berberi</th>
            <th>Data</th>
            <th>Modifiko</th>
            <th>Fshij</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $rezevimet=merrRezervimet();
            while ($rezevimi =mysqli_fetch_assoc($rezevimet)) {
                $rid=$rezevimi['rezervimiid'];
                echo "<tr class='active-row'>";
                echo "<td>". $rezevimi['emrimbiemri'] . "</td>";
                echo "<td>". $rezevimi['emri'] . "</td>";
                echo "<td>". $rezevimi['emriMbiemri'] . "</td>";
                echo "<td>". $rezevimi['data'] . "</td>";
                
                echo "<td><a href='shto_modifiko_rezervim.php?rid={$rid}'>
                <i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='fshij_rezervim.php'>
                <i class='far fa-trash-alt'></i></a></td>";
                echo "</tr>";
            }
               
            ?>
        </tbody>
    </table>
    <a href="shto_modifiko_rezervim.php" id="add_entity"><i class="fas fa-plus"></i> Shto Rezervim</a>
</section>

<?php/*
include "inc/footer.php";

?>
