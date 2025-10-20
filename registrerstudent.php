<?php
include("db-tilkobling.php");
?>

<h3>Registrer student</h3>

<form method="post" action="" id="registrerStudentForm" name="registrerStudentForm">
    Brukernavn: <input type="text" id="brukernavn" name="brukernavn" maxlength="10" required /> <br/>
    Fornavn: <input type="text" id="fornavn" name="fornavn" required /> <br/>
    Etternavn: <input type="text" id="etternavn" name="etternavn" required /> <br/>

    Klassekode: 
    <select name="klassekode" id="klassekode" required>
        <option value="">-- Velg klasse --</option>
        <?php
        $sql = "SELECT * FROM klasse ORDER BY klassekode";
        $resultat = mysqli_query($db, $sql);

        while ($rad = mysqli_fetch_array($resultat)) {
            $klassekode = $rad["klassekode"];
            $klassenavn = $rad["klassenavn"];
            echo "<option value='$klassekode'>$klassekode - $klassenavn</option>";
        }
        ?>
    </select>
    <br/>
    <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp"/>
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br/>
</form>

<?php
if (isset($_POST["registrerStudentKnapp"])) {
    $brukernavn = trim($_POST["brukernavn"]);
    $fornavn = trim($_POST["fornavn"]);
    $etternavn = trim($_POST["etternavn"]);
    $klassekode = trim($_POST["klassekode"]);

    if (empty($brukernavn) || empty($fornavn) || empty($etternavn) || empty($klassekode)) {
        echo "<p style='color:red;'>Alle felt må fylles ut!</p>";
     }
    // Sjekk lengde på brukernavn
    elseif (strlen($brukernavn) > 10) {
        echo "<p style='color:red;'>Feil: Brukernavnet kan ikke være mer enn 10 tegn!</p>";
    } 

    } 
    else 
    {
        $sjekk = "SELECT * FROM student WHERE brukernavn='$brukernavn'";
        $resultat = mysqli_query($db, $sjekk);

        if (mysqli_num_rows($resultat) > 0) {
            echo "<p style='color:red;'>Feil: Brukernavnet <strong>$brukernavn</strong> finnes allerede!</p>";
        } else {
            $sqlSetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode)
                           VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode')";
            if (mysqli_query($db, $sqlSetning)) {
                echo "<p style='color:green;'>Følgende student er nå registrert: 
                      <strong>$brukernavn, $fornavn, $etternavn, $klassekode</strong></p>";
            } else {
                echo "<p style='color:red;'>Feil ved registrering: " . mysqli_error($db) . "</p>";
            }
        }
    }
}
?>
