
















<?php
foreach ($tab_u as $u){
    echo 'Utilisateur de login' . '<a href="index.php?action=read&controller=utilisateur&login='.rawurlencode($u->getLogin()).'"> '.htmlspecialchars($u->getLogin()) . '</a>, ' . htmlspecialchars($u->getPrenom()). ' '. htmlspecialchars($u->getNom()) . '<br>';
}
?>