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
    $klassekode = $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"];
    $studiumkode = $_POST["studiumkode"];

    if (!$klassekode || !$klassenavn || !$studiumkode)
    {
        print("Alle felt m&aring; fylles ut");
    }
    else
    {
        include("db-tilkobling.php"); 

        $sqlSetning= "INSERT INTO klasse (klassekode, klassenavn, studiumkode)
        VALUES ('$klassekode', '$klassenavn', '$studiumkode')";
        mysqli_query(db, $sqlSetning) or die ("Ikke mulig &aring; registrere data i databasen");

        print ("F&oslash;lgende klasse er n&aring; registrert: $klassekode $klassenavn $studiumkode");

    }
}
?>
