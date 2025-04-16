<?php
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $livres = file_exists('livres.json') ? json_decode(file_get_contents('livres.json'), true) : [];
    $livre = $livres[$index];

    if ($_POST['titre'] && $_POST['auteur']) {
        $livres[$index] = [
            'titre' => $_POST['titre'],
            'auteur' => $_POST['auteur']
        ];
        file_put_contents('livres.json', json_encode($livres, JSON_PRETTY_PRINT));
        header('Location: index.php'); // Redirection vers la liste après modification
    }
} else {
    header('Location: index.php'); // Si l'index n'est pas fourni, redirection vers la liste
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier un Livre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h1 class="mb-4">Modifier un Livre</h1>

  <form method="POST">
    <div class="mb-3">
      <input type="text" name="titre" class="form-control" placeholder="Titre du livre" value="<?= htmlspecialchars($livre['titre']) ?>" required>
    </div>
    <div class="mb-3">
      <input type="text" name="auteur" class="form-control" placeholder="Auteur du livre" value="<?= htmlspecialchars($livre['auteur']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
  </form>

</body>
</html>
