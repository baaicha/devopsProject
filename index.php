<?php
$livres = file_exists('livres.json') ? json_decode(file_get_contents('livres.json'), true) : [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des Livres</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script>
    function confirmDelete(url) {
      if (confirm("Êtes-vous sûr de vouloir supprimer ce livre ?")) {
        window.location.href = url;
      }
    }
  </script>
</head>
<body class="container mt-5">

  <h1 class="mb-4">Liste des Livres</h1>
  <a href="ajouter.php" class="btn btn-success mb-4">Ajouter un Livre</a>
  
  <ul class="list-group">
    <?php foreach ($livres as $index => $livre): ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <?= htmlspecialchars($livre['titre']) ?> - <?= htmlspecialchars($livre['auteur']) ?>
        <a href="modifier.php?index=<?= $index ?>" class="btn btn-sm btn-warning">Modifier</a>
        <!-- Remplacer le lien par un bouton appelant confirmDelete -->
        <button onclick="confirmDelete('supprimer.php?index=<?= $index ?>')" class="btn btn-sm btn-danger">Supprimer</button>
      </li>
    <?php endforeach; ?>
  </ul>

</body>
</html>
