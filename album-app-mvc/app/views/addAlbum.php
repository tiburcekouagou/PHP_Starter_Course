<!DOCTYPE html>
<html>

<head>
  <title>Add New Album</title>
</head>

<body>
  <h1>Add New Album</h1>
  <form action="/add" method="post">
    <label>Title: <input type="text" name="title"></label><br>
    <label>Artiste: <input type="text" name="artiste"></label><br>
    <input type="submit" value="Add">
  </form>
  <a href="/home">Back to Album List</a>
</body>

</html>