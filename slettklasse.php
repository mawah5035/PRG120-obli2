<?php
include("db-tilkobling.php");
?>

<h3>Slett klasse</h3>
<form method="post" action="" id="slettKlasseForm" name="slettKlasseForm" onSubmit="return bekreft()">
    <select name ="klassekode" id="klassekode" required>
        <option value="" >-- Velg klasse --</option>
        
        <?php
    $sql= "SELECT * FROM klasse ORDER BY klassekode";
    $resultat= mysqli_query($db, $sql);

    while ($rad= mysqli_fetch_array($resultat))
    {
        $klassekode= $rad["klassekode"];
        $klassenavn= $rad["klassenavn"];
        echo "<option value='$klassekode'>$klassekode - $klassenavn</option>";
    }
    ?>
    </select>

    <br><br>
    <input type="submit" value="Slett klasse" id="slettKlasseKnapp" name="slettKlasseKnapp"/>
</form>

<?php

if (isset($_POST["slettKlasseKnapp"]))
{
    $klassekode= $_POST["klassekode"];

    if (empty($klassekode))
    {
        echo "<p style='color:red;'> Du m&aring; velge en klasse å slette!</p>";
    }
    else
    {
        $skjekk= "SELECT * FROM klasse WHERE klassekode='$klassekode'";
        $resultat= mysqli_query($db, $skjekk);

        if (mysqli_num_rows($resultat) == 0)
        {
            echo "<p style='color:red;'> Feil: Klassen med klassekode <strong>$klassekode</strong> finnes ikke!</p>";
        }
        else
        {
            $sql = "DELETE FROM klasse WHERE klassekode='$klassekode'";
            if (mysqli_query($db, $sql))
            {
                echo "<p style='color:green;'> Klassen med klassekode <strong>$klassekode</strong> er slettet fra databasen.</p>";
            }
            else
            {
                echo "<p style='color:red;'> Feil ved sletting: " . mysqli_error($db) . "</p>";
            }
        }
    }
}
?>
