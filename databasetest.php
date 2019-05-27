<?php
$db = new SQLite3("sqlite-beispiele.db");
$sql = "CREATE TABLE tabelle (
id INTEGER PRIMARY KEY, // erzeugt Autowert
feld VARCHAR(1000)
)";
if ($db->exec($sql)) {
echo "Tabelle angelegt.<br />";
}else echo "Keine Tabelle angelegt.<br />";
$sql = "INSERT INTO tabelle (feld) VALUES ('Wert1')";
if ($db->exec($sql)) {
$id = $db->lastInsertRowID(); // liefert Autowert
echo "Daten mit der ID $id eingetragen.";
}else echo "Keine Daten mit der ID $id eingetragen.<br />";
$db->close();
?>
