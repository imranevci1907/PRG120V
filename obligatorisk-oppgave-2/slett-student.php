<?php
/*
   Programmet sletter en student fra databasen
*/
include("db-tilkobling.php");  /* kobling til database */
?>

<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <title>Slett student</title>
  <!-- Koble til JavaScript-fila -->
  <script src="funksjoner.js"></script>
</head>
<body>
  <h3>Slett student</h3>

  <form method="post" action="">
    Brukernavn:
    <input type="text" name="brukernavn" required>
    <!-- Koble knappen til bekreft()-funksjonen -->
    <input type="submit" value="Slett student" name="slettStudentKnapp" onclick="return bekreft();">
  </form>

  <?php
  if (isset($_POST["slettStudentKnapp"])) {
      $brukernavn = $_POST["brukernavn"];

      if (!$brukernavn) {
          print("Du må skrive inn et brukernavn");
      } else {
          $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";
          $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen");

          if (mysqli_affected_rows($db) > 0) {
              print("Student med brukernavn <b>$brukernavn</b> er slettet.");
          } else {
              print("Fant ingen student med brukernavn <b>$brukernavn</b>.");
          }
      }
  }
  ?>
</body>
</html>