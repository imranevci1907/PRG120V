<?php
$host = "localhost";
$user = "root";     // endre hvis du har annen bruker
$pass = "";         // passord, hvis du har
$db   = "skole";    // databasenavn du har laget

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Databasefeil: " . $conn->connect_error);
}
?>
