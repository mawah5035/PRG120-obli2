<?php
include("db-tilkobling.php");
?>

<h3> Vis alle klasser </h3>

<?php

$sql= "SELECT * FROM klasse ORDER BY klassekode"; 
$resultat= mysqli_query($db, $sql);

if (mysqli_num_rows(resultat) == 0)
{
    echo "<p> Det finnes ingen registerte klasser i databasen.</p>";

}
else
{
    echo "<table border='1' cellpadding= '5' cellspacing='0'>";
    echo "<tr>
    <th> Klassekode </th>
    <th> Klassenavn </th>
    <th> Studiumkode </th>
    </tr>";

    while ($rad = mysqli_fetch_array($resultat))
    {
        $klassekode = $rad["klassekode"];
        $klassenavn = $rad["klassenavn"];
        $studiumkode = $rad["studiumkode"];

        echo "<tr>
        <td> $klassekode </td>
        <td> $klassenavn </td>
        <td> $studiumkode </td>
        </tr>";
    }
    echo "</table>";
}