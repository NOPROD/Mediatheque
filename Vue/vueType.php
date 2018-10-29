<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 20/08/2018
 * Time: 13:13
 */
$this->titre = "";
$this->script = '';
$data = json_decode($listeTypes);

echo "<div class='matable'>";
echo"<table>\n";
echo "<tr><th class='id'>Id</th><th class = 'nom'>Type</th></tr>";
foreach ($data as $ligne) {
    echo "<tr>\n";
    echo "<td>$ligne->id</td>\n";
    echo "<td>$ligne->nom</td>\n";
    echo "</tr>\n";
}
echo "</table></div>";
?>

