<!DOCTYPE html>
<html>

<head>
  <title>Liste des albums</title>
</head>

<body>
  <h1>Liste des albums</h1>
  <ul>
    <?php foreach ($albums as $album) : ?>
      <li>
        <?php echo $album['title']; ?> - <?php echo $album['artiste']; ?>
        <a href="/edit?id=<?php echo $album['id']; ?>">Modifier</a>
        <a href="/delete?id=<?php echo $album['id']; ?>">Supprimer</a>
      </li>
    <?php endforeach; ?>
  </ul>
  <h2>Ajouter un nouvel album</h2>
  <form action="/add" method="post">
    <label>Titre: <input type="text" name="title"></label><br>
    <label>Artiste: <input type="text" name="artiste"></label><br>
    <input type="submit" value="Ajouter">
  </form>
</body>

</html>