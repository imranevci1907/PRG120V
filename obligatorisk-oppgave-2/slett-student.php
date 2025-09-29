<?php /* slett-student-med-listeboks */ ?>

<h3>Slett student</h3>

<!-- kobler inn bekreft()-funksjonen -->
<script src="funksjoner.js"></script>

<form method="post" action="" onSubmit="return bekreft()">
  Student: 
  <select name="brukernavn" required>
    <option value="">velg student</option>
    <?php include("dynamiske-funksjoner.php"); listeboksStudent(); ?> 
  </select> <br/>
  <input type="submit" name="slettStudentKnapp" value="Slett student" />
</form>

<?php
if (isset($_POST["slettStudentKnapp"])) {
    include("db-tilkobling.php");
    $brukernavn = $_POST["brukernavn"];

    $sql = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
    $resultat = mysqli_query($db,$sql) or die("Feil i SELECT: " . mysqli_error($db));

    if (mysqli_num_rows($resultat) == 0) {
        print("Studenten finnes ikke");
    } else {
        $sql = "DELETE FROM student WHERE brukernavn='$brukernavn';";
        mysqli_query($db,$sql) or die("Ikke mulig å slette student");
        print("Student slettet: $brukernavn");
    }
}
?>
