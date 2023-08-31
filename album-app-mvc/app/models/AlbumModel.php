<?php
class AlbumModel {

  // Méthode de connection à la BDD
  private static function getConnection() {
    global $servername, $username, $password, $dbname;

    try {
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ];

      $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password, $options);
      return $pdo;
    } catch (\PDOException $e) {
      echo "Error: " . $e->getMessage();
      return null;
    }
  }
  // Méthode pour récupérer tous les albums
  public static function getAllAlbums() {
    $pdo = self::getConnection();
    if ($pdo) {
      try {
        $sql = "SELECT * FROM albums";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
      } catch (\PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
      }
    } else {
      return [];
    }
  }

  // Méthode pour ajouter un nouvel album
  public static function addAlbum($title, $artiste) {
    $pdo = self::getConnection();

    if ($pdo) {
      try {
        $sql = "INSERT INTO albums (title, artiste) VALUES (:title, :artiste);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":artiste", $artiste);
        $stmt->execute();
        return true; // ajout effectué
      } catch (\PDOException $e) {
        echo "Error" . $e->getMessage();
        return false; // echec d'ajou
      }
    }
  }

  // Méthode pour récupérer un album par son ID
  public static function getAlbumById($id) {
    $pdo = self::getConnection();

    if ($pdo) {
      try {
        $sql = "SELECT * FROM albums WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null; // Error retrieving album
      }
    } else {
      return null; // Error establishing connection
    }
  }

  // Méthode pour mettre à jour un album
  public static function updateAlbum($id, $title, $artiste) {
    $pdo = self::getConnection();

    if ($pdo) {
      try {
        $sql = "UPDATE albums SET title = :title, artiste = :artiste WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':artiste', $artiste);
        $stmt->execute();
        return true; // Mise à jour effectuée avec succès
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false; // Erreur de mise à jour
      }
    } else {
      return false; // Error establishing connection
    }
  }

  // Méthode pour supprimer un album par son ID
  public static function deleteAlbum($id) {
    $pdo = self::getConnection();

    if ($pdo) {
      try {
        $sql = "DELETE FROM albums WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true; // Successfully deleted album
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false; // Error deleting album
      }
    } else {
      return false; // Error establishing connection
    }
  }
}
