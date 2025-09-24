<?php
/*
   Programmet sletter en klasse (og alle tilhørende studenter) fra databasen
*/
include("db-tilkobling.php");  /* kobling til database */

?>

<h3>Slett klasse</h3>

<form method="post" action="">
  Klassekode: 
  <input type="text" name="klassekode" required>
  <input type="submit" value="Slett klasse" name="slettKlasseKnapp">
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {
    $klassekode = $_POST["klassekode"];

    if (!$klassekode) {
        print("Du må skrive inn en klassekode");
    } else {
        // Først slett studenter som hører til klassen
        $sqlStudenter = "DELETE FROM student WHERE klassekode='$klassekode';";
        mysqli_query($db, $sqlStudenter);

        // Deretter slett selve klassen
        $sqlKlasse = "DELETE FROM klasse WHERE klassekode='$klassekode';";
        mysqli_query($db, $sqlKlasse) or die("Ikke mulig å slette data i databasen");

        if (mysqli_affected_rows($db) > 0) {
            print("Klasse med kode <b>$klassekode</b> og alle tilhørende studenter er slettet.");
        } else {
            print("Fant ingen klasse med kode <b>$klassekode</b>.");
        }
    }
}
?>