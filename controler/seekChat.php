 <?php
//Pour récupérer data(SQL).

include_once "../modele/database.php";
$db = new Data();

$jsonDataRecup = $db->seekFromSQL();
echo $jsonDataRecup;

?> 