<?php
$host = "localhost";      // server
$user = "root";           // brukernavn til databasen
$pass = "";               // passord
$db   = "prg120v";        // databasenavn

// Oppretter tilkobling
$conn = new mysqli($host, $user, $pass, $db);

// Sjekk om det gikk bra
if ($conn->connect_error) {
    die("Feil ved tilkobling: " . $conn->connect_error);
}
?>