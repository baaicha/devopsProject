<?php
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $livres = file_exists('livres.json') ? json_decode(file_get_contents('livres.json'), true) : [];
    array_splice($livres, $index, 1);  // Supprimer le livre à l'index spécifié
    file_put_contents('livres.json', json_encode($livres, JSON_PRETTY_PRINT));
}
header('Location: index.php'); // Redirection vers la liste après suppression
