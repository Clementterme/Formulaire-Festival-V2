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
      var_dump("coucou");
    } catch (PDOException $error) { var_dump("adios");
      die('Erreur : ' . $error->getMessage());
    }
  }

  /**
   
Retourne la connexion BDD établie et l'objet PDO associé.*/
public function getDB(){
  return $this->DB;}
}
