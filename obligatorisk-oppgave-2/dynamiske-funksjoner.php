<?php
function listeboksStudent() {
    include("db-tilkobling.php");
    $sql = "SELECT * FROM student ORDER BY brukernavn;";
    $resultat = mysqli_query($db,$sql);

    while ($rad = mysqli_fetch_array($resultat)) {
        $brukernavn = $rad["brukernavn"];
        $fornavn    = $rad["fornavn"];
        $etternavn  = $rad["etternavn"];

        print("<option value='$brukernavn'>$brukernavn - $fornavn $etternavn</option>");
    }
}
?>