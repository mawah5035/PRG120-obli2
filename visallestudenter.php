<?php
include("db-tilkobling.php");
?>

<h3>Alle registrerte studenter</h3>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Brukernavn</th>
        <th>Fornavn</th>
        <th>Etternavn</th>
        <th>Klassekode</th>
    </tr>

    <?php
    $sql = "SELECT * FROM student ORDER BY brukernavn";
    $resultat = mysqli_query($db, $sql);

    if (mysqli_num_rows($resultat) > 0) {
    while ($rad = mysqli_fetch_assoc($resultat)) {
        echo "<tr>"; 
        echo "<td>" . htmlspecialchars($rad['brukernavn']) . "</td>";
        echo "<td>" . htmlspecialchars($rad['fornavn']) . "</td>";         
        echo "<td>" . htmlspecialchars($rad['etternavn']) . "</td>";
        echo "<td>" . htmlspecialchars($rad['klassekode']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Ingen studenter funnet.</td></tr>";
}

    ?>
</table>
