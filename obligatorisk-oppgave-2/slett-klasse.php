<?php
/*
   Programmet sletter en klasse fra databasen
*/
include("db-tilkobling.php");  /* kobling til database */
?>

<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Slett klasse</title>
  <!-- Koble til JavaScript-fila -->
  <script src="funksjoner.js"></script>
</head>
<body>
  <h3>Slett klasse</h3>

  <form method="post" action="">
    Klassekode:
    <input type="text" name="klassekode" required>
    <!-- Koble knappen til bekreft()-funksjonen -->
    <input type="submit" value="Slett klasse" name="slettKlasseKnapp" onclick="return bekreft();">
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
</body>
</html>