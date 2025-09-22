<?php  /* registrer-klasse */
/*
   Programmet lager et html-skjema for å registrere en klasse
   Programmet registrerer data (klassekode, klassenavn, studiumkode) i databasen
*/
?> 

<h3>Registrer klasse</h3>

<form method="post" action="" id="registrerKlasseSkjema" name="registrerKlasseSkjema">
  Klassekode: <input type="text" id="klassekode" name="klassekode" maxlength="5" required /> <br/>
  Klassenavn: <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
  Studiumkode: <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
  
  <input type="submit" value="Registrer klasse" id="registrerKlasseKnapp" name="registrerKlasseKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
if (isset($_POST["registrerKlasseKnapp"])) {
    $klassekode  = $_POST["klassekode"];
    $klassenavn  = $_POST["klassenavn"];
    $studiumkode = $_POST["studiumkode"];

    if (!$klassekode || !$klassenavn || !$studiumkode) {
        print("Alle felt må fylles ut");
    } else {
        include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

        $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die("Ikke mulig å hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat); 

        if ($antallRader!=0)  { /* klasse finnes fra før */
            print("Klassen er registrert fra før");
        } else {
            $sqlSetning="INSERT INTO klasse VALUES('$klassekode','$klassenavn','$studiumkode');";
            mysqli_query($db,$sqlSetning) or die("Ikke mulig å registrere data i databasen");
            /* SQL-setning sendt til database-serveren */

            print("Følgende klasse er nå registrert: $klassekode $klassenavn $studiumkode"); 
        }
    }
}
?> 