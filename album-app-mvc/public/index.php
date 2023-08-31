<?php
require_once('../config/constants.php');

require_once('../config/config.php');
require_once('../app/controllers/AlbumController.php');

$controller = new AlbumController();

// Traiter les requêtes ici en utilisant des routes ou directement

// $controller->home();

// Récupérer la page requêtée ou l'action depuis l'URL
$request = $_SERVER['REQUEST_URI'];
$qs = strpos($request, "?");

if ($qs) {
  $request = substr($request, 0, $qs);
}
// Définition des routes et attribution des controlleurs appropriés
if ($request === "/home" || $request === "/") {
  $controller->home();
} else if ($request === "/edit") {
  $controller->editAlbum($_GET["id"]);
} else if ($request === "/update") {
  $controller->updateAlbum($_POST["id"], $_POST['title'], $_POST['artiste']);
  header('Location: /home'); // Rediriger après la mise à jour
  exit();
} else if ($request === "/delete") {
  $controller->deleteAlbum($_GET["id"]);
  header('Location: /home'); // Rediriger après la suppression
  exit();
} else if ($request === "/add") {
  echo "adding...";
  $controller->addAlbum($_POST["title"], $_POST["artiste"]);
  header('Location: /home'); // Rediriger après l'ajout
} else {
  // afficher un message 404 not found
  echo "404 - Page Non Trouvée !";
}
