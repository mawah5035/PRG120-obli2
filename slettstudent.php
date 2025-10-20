<?php
include("db-tilkobling.php");

if (isset($_GET['slett'])) {
    $brukernavn = $_GET['slett'];

    $stmt = mysqli_prepare($db, "DELETE FROM student WHERE brukernavn = ?");
    mysqli_stmt_bind_param($stmt, "s", $brukernavn);
    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color:green;'>Studenten '$brukernavn' er slettet.</p>";
    } else {
        echo "<p style='color:red;'>Feil ved sletting: " . mysqli_error($db) . "</p>";
    }
    mysqli_stmt_close($stmt);
}
?>
