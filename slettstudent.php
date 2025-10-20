<?php
include("db-tilkobling.php");
?>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentForm" name="slettStudentForm" onsubmit="return bekreft()">
    <select name="brukernavn" id="brukernavn" required>
        <option value="">-- Velg student --</option>

        <?php
        // Hent alle studenter fra databasen
        $sql = "SELECT * FROM student ORDER BY brukernavn";
        $resultat = mysqli_query($db, $sql);

        while ($rad = mysqli_fetch_array($resultat)) {
            $brukernavn = $rad["brukernavn"];
            $fornavn = $rad["fornavn"];
            $etternavn = $rad["etternavn"];
            echo "<option value='$brukernavn'>$brukernavn - $fornavn $etternavn</option>";
        }
        ?>
    </select>
    <br><br>
    <input type="submit" value="Slett student" id="slettStudentKnapp" name="slettStudentKnapp"/>
</form>

<script>
function bekreft() {
    return confirm("Er du sikker på at du vil slette denne studenten?");
}
</script>

<?php
if (isset($_POST["slettStudentKnapp"])) {
    $brukernavn = $_POST["brukernavn"];

    if (empty($brukernavn)) {
        echo "<p style='color:red;'>Du må velge en student å slette!</p>";
    } else {
        // Sjekk at studenten finnes
        $sjekk = "SELECT * FROM student WHERE brukernavn='$brukernavn'";
        $resultat = mysqli_query($db, $sjekk);

        if (mysqli_num_rows($resultat) == 0) {
            echo "<p style='color:red;'>Feil: Studenten med brukernavn <strong>$brukernavn</strong> finnes ikke!</p>";
        } else {
            // Slett studenten
            $sql = "DELETE FROM student WHERE brukernavn='$brukernavn'";
            if (mysqli_query($db, $sql)) {
                echo "<p style='color:green;'>Studenten med brukernavn <strong>$brukernavn</strong> er slettet fra databasen.</p>";
            } else {
                echo "<p style='color:red;'>Feil ved sletting: " . mysqli_error($db) . "</p>";
            }
        }
    }
}
?>
