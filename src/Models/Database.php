<?php


class Database
{
  private $DB;
  private $config;

  public function __construct()
  {
    $this->config = __DIR__ . '/../../config.php';
    require_once $this->config;

    try {
      $dsn = "mysql:host=" . DATABASE_HOST . ";dbname=" . DATABASE_NAME;
      $this->DB = new PDO($dsn, DATABASE_USERNAME, DATABASE_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      
    } catch (PDOException $error) {;
      die('Erreur : ' . $error->getMessage());
    }
  }

  /**
   
Retourne la connexion BDD établie et l'objet PDO associé.*/
public function getDB(): PDO
{
  return $this->DB;
}

public function initialisationBDD(): string 
{
  if  ($this->testIfTableUsersExists()) {
    return "La bse de données semble déjà remplie.";
    die();
  } else {
    try {
      $i = 0;
      ($migrationExistante === TRUE);
      while ($migrationExistante === TRUE) {
        $migration = __DIR__ . "/../Migrations/migration$i.sql";
        if (file_exists($migration)) {
          $sql = file_get_contents($migration);
          $this->DB->query($sql);
          $i++;
        } else {
          $migration = FALSE;
        }
      }
    }
  }
}
}
