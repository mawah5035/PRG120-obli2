<?php /*registere klasse*/
?>



<h3>Registere klasse</h3>

<form method="post" action="" id="registrerKlasseForm" name="registrerKlasseForm">
    Klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
    Klassenavn <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
    Studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/> 
    <input type="submit" value= "Registrer klasse" id= "registrerKlasseKnapp" name="registrerKlasseKnapp"/>
    <input type="reset" value="Nullstill" id="nullstill" name= "nullstill" /> <br />
</form>

<?php
if (isset($_POST["registrerKlasseKnapp"]))
{
    $klassekode = trim($_POST["klassekode"]);
    $klassenavn = trim($_POST["klassenavn"]);
    $studiumkode = trim($_POST["studiumkode"]);

    if (empty($klassekode) || empty($klassenavn) || empty($studiumkode))
    {
        echo "<p style= 'color:red;'> Alle felt m&aring; fylles ut!</p>";
}
    
    else
    {
        include("db-tilkobling.php"); 

        $sqlSetning= "INSERT INTO klasse (klassekode, klassenavn, studiumkode)
        VALUES ('$klassekode', '$klassenavn', '$studiumkode')";
        if (mysqli_query($db, $sqlSetning)) {
                echo "<p style='color:green;'>Følgende klasse er nå registrert: <strong>$klassekode, $klassenavn, $studiumkode</strong></p>";
            } else {
                echo "<p style='color:red;'>Feil ved registrering: " . mysqli_error($db) . "</p>";
            }
    }
}
}

?>
