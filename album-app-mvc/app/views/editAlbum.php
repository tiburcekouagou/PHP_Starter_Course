<!DOCTYPE html>
<html>

<head>
  <title>Modifier un album</title>
</head>

<body>
  <h1>Modifier un album</h1>
  <form action="/update" method="post">
    <input type="hidden" name="id" value="<?php echo $album['id']; ?>">
    <label>Titre: <input type="text" name="title" value="<?php echo $album['title']; ?>"></label><br>
    <label>Artiste: <input type="text" name="artiste" value="<?php echo $album['artiste']; ?>"></label><br>
    <input type="submit" value="Modifier">
  </form>
</body>

</html>