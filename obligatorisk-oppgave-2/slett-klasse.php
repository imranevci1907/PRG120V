<?php /* slett-klasse-med-listeboks */ ?>

<h3>Slett klasse</h3>

<!-- kobler inn bekreft()-funksjonen -->
<script src="funksjoner.js"></script>

<form method="post" action="" onSubmit="return bekreft()">
  Klasse: 
  <select name="klassekode" required>
    <option value="">velg klasse</option>
    <?php include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?> 
  </select> <br/>
  <input type="submit" name="slettKlasseKnapp" value="Slett klasse" />
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {
    include("db-tilkobling.php");
    $klassekode = $_POST["klassekode"];

    $sql = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
    $resultat = mysqli_query($db,$sql) or die("Feil i SELECT: " . mysqli_error($db));

    if (mysqli_num_rows($resultat) == 0) {
        print("Klassen finnes ikke");
    } else {
        $sql = "DELETE FROM klasse WHERE klassekode='$klassekode';";
        mysqli_query($db,$sql) or die("Ikke mulig å slette klassen (sjekk om studenter er registrert på den)");
        print("Klasse slettet: $klassekode");
    }
}
?>