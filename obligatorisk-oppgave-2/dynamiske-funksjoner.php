<?php
function listeboksKlassekode() {
    include("db-tilkobling.php");
    $sql = "SELECT * FROM klasse ORDER BY klassekode;";
    $resultat = mysqli_query($db,$sql);
    while ($rad = mysqli_fetch_array($resultat)) {
        $kode = $rad["klassekode"];
        $navn = $rad["klassenavn"];
        print("<option value='$kode'>$kode - $navn</option>");
    }
}
?>