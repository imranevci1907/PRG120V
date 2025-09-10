<!DOCTYPE html>
<html>
<head>
    <title>Multiplikasjonstest</title>
</head>
<body>
    <form method="post" action="">
        <label>Hva er 3 ganger 3?</label>
        <input type="number" name="svar">
        <input type="submit" value="Send inn">
    </form>

<?php  /oppgave 1*/
/*
/* Programmet mottar fra et HTML-skjema et svar på spørsmålet "Hva er 3 ganger 3 ?"
/* Programmet sjekker om svaret er riktig og skriver ut en melding avhengig av om svaret er riktig eller feil
*/
$svar=$_POST["svar"];
if ($svar==9) /*avgitt svar er riktig*/
{
  print("riktig. 3 ganger 3 er 9<br/>")
}
else /* avgitt svar er feil*/
{
    print("feil. 3 ganger er ikke $svar. 3 ganger 3 er 9<br/>");
}
?>