<?php
require_once(MODEL_ROOT . 'AlbumModel.php');

class AlbumController {
  public function home() {
    $albums = AlbumModel::getAllAlbums();
    require(APP_ROOT . 'app\views\home.php');
  }

  public function editAlbum($id) {
    $album = AlbumModel::getAlbumById($id);
    require(APP_ROOT . 'app/views/editAlbum.php');
  }

  public function updateAlbum(string $id, string $title, string $artiste) {
    echo "about to update $id $title $artiste";
    
    AlbumModel::updateAlbum($id, $title, $artiste);
    header('HTTP/1.1 302 Found');
    header('Location: index.php');
  }

  public function deleteAlbum($id) {
    AlbumModel::deleteAlbum($id);
    header('HTTP/1.1 302 Found');
    header('Location: index.php');
  }

  public function addAlbum($title, $artist) {
    AlbumModel::addAlbum($title, $artist);

    require APP_ROOT . "app/views/addAlbum.php";
    // header('HTTP/1.1 302 Found');
    // header('Location: index.php');
  }
}
