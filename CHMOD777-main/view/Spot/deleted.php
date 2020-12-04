<?php

echo "<p>Le spot d'id : " . $id_spot . " a bien été supprimé !</p>";
require File::build_path(array("view","Spot","list.php"));
?>
