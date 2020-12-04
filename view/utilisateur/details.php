<div style="display: flex; flex-direction: column; padding: 1%;
max-width: 30%; border: 2px solid black">

<?php
echo "<div> Connecté en tant que : " . htmlspecialchars($user->getLogin()) . "</div>";
echo "<div>" . htmlspecialchars($user->getPrenom()) . " " . htmlspecialchars($user->getNom()) . "</div>";
echo "<div>" . htmlspecialchars($user->getAdresse()) . "</div>";
echo "<div>" . htmlspecialchars($user->getMail()) . "</div>";
echo "<div>" . htmlspecialchars($user->getTel()) . "</div>";

echo '<div style="display: flex; justify-content: space-evenly;
max-width: 100%; color: white">';

echo '<p class="button"> <a href="index.php?action=delete&controller=utilisateur&login=' . rawurlencode($user->getLogin()) . '"> Supprimer </a> </p>';
echo '<p class="button"> <a href="index.php?action=update&controller=utilisateur&login=' . rawurlencode($user->getLogin()) . '"> Modifier </a> </p>';

echo '</div>';

?>

</div>

