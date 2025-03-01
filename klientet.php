
<?php
include "inc/header.php";

?>
<section class="list-entity container">
    <div class="image">
        <img src="images/clients.jpg" alt="">
    </div>
    <?php
    if(isset($_SESSION['mesazhi1'])){
        echo "<div id='mesazhi1'>" . $_SESSION['mesazhi1'] . "</div>";
    }
    
    ?>
    <table class="styled-table">
        <thead>
        <tr>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Email</th>
            <th>Nr Telefonit</th>
            <th>Modifiko</th>
            <th>Fshij</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $klientet=merrKlientet();
            while($klienti = mysqli_fetch_assoc($klientet)){
                $kid=$klienti['klientiid'];
                echo "<tr class='active-row'>";
                echo "<td>" . $klienti['emri'] . "</td>";
                echo "<td>" . $klienti['mbiemri'] . "</td>";
                echo "<td>" . $klienti['email'] . "</td>";
                echo "<td>" . $klienti['telefoni'] . "</td>";
                echo "<td><a href='shto_modifiko_klient.php?klientiid={$kid}'>
                <i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='fshij_klient.php?klientiid={$kid}'>
                <i class='far fa-trash-alt'></i></a></td>";
                echo "</tr>";
            }
            
            ?>
    </table>
    <a href="shto_modifiko_klient.php" id="add_entity"><i class="fas fa-plus"></i> Shto Klient</a>
</section>
    
<?php 
/*
include "inc/footer.php";
*/
?>