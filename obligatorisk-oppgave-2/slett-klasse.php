<?php
/*
   Programmet sletter en klasse fra databasen
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
        $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen");

        if (mysqli_affected_rows($db) > 0) {
            print("Klasse med kode <b>$klassekode</b> er slettet.");
        } else {
            print("Fant ingen klasse med kode <b>$klassekode</b>.");
        }
    }
}
?>