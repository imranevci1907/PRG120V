    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kode = $_POST["klassekode"];
        $navn = $_POST["klassenavn"];
        $studium = $_POST["studiumkode"];

        $sql = "INSERT INTO klasse (klassekode, klassenavn, studiumkode)
                VALUES ('$kode', '$navn', '$studium')";
        if ($conn->query($sql)) {
            echo "<p style='color:green;'>Klasse registrert!</p>";
        } else {
            echo "<p style='color:red;'>Feil: " . $conn->error . "</p>";
        }
    }
    ?>