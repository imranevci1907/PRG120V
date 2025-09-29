<?php /* registrer-student */ ?>

<h3>Registrer student</h3>

<form method="post" action="">
  Brukernavn: <input type="text" name="brukernavn" required /> <br/>
  Fornavn: <input type="text" name="fornavn" required /> <br/>
  Etternavn: <input type="text" name="etternavn" required /> <br/>
  Klasse: 
  <select name="klassekode" required>
    <option value="">velg klasse</option>
    <?php include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
  </select> <br/>
  <input type="submit" name="registrerStudentKnapp" value="Registrer student" />
</form>

<?php
if (isset($_POST["registrerStudentKnapp"])) {
    include("db-tilkobling.php");

    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode) {
        print("Alle felt må fylles ut");
    } else {
        $sql = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
        $resultat = mysqli_query($db, $sql);
        if (mysqli_num_rows($resultat) > 0) {
            print("Student finnes fra før");
        } else {
            $sql = "INSERT INTO student VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
            mysqli_query($db, $sql) or die("Ikke mulig å registrere student");
            print("Student er registrert: $brukernavn $fornavn $etternavn ($klassekode)");
        }
    }
}
?>