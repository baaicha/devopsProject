<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier que les champs sont bien remplis
    if (isset($_POST['titre']) && isset($_POST['auteur']) && !empty($_POST['titre']) && !empty($_POST['auteur'])) {
        $livres = file_exists('livres.json') ? json_decode(file_get_contents('livres.json'), true) : [];
        $livres[] = [
            'titre' => $_POST['titre'],
            'auteur' => $_POST['auteur']
        ];
        file_put_contents('livres.json', json_encode($livres, JSON_PRETTY_PRINT));
        header('Location: index.php');
        exit;
    } else {
        // Afficher un message d'erreur si les champs sont vides
        $error_message = "Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un Livre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h1 class="mb-4">Ajouter un Livre</h1>

  <!-- Afficher un message d'erreur si nécessaire -->
  <?php if (isset($error_message)): ?>
    <div class="alert alert-danger">
      <?= htmlspecialchars($error_message) ?>
    </div>
  <?php endif; ?>

  <form method="POST">
    <div class="mb-3">
      <input type="text" name="titre" class="form-control" placeholder="Titre du livre" required>
    </div>
    <div class="mb-3">
      <input type="text" name="auteur" class="form-control" placeholder="Auteur du livre" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </form>

</body>
</html>
