<?php
$host = "localhost";      // server
$user = "root";           // brukernavn til databasen
$pass = "";               // passord (kan være tomt i noen oppsett)
$db   = "prg120v";        // databasenavn du har laget

// Oppretter tilkobling
$conn = new mysqli($host, $user, $pass, $db);

// Sjekk om det gikk bra
if ($conn->connect_error) {
    die("Feil ved tilkobling: " . $conn->connect_error);
}
?>