<?php

// class Connection{

  // private $host;
  // private $username;
  // private $password;
  // private $db_name;

  // public function get_data_config() {
  //   $this->host = '192.168.0.164';
  //   $this->username = 'usuario';
  //   $this->password = 'vital2024.';
  //   $this->db_name = 'vitalclinic';
  // }

//   public function connect(){

//       $this->get_data_config();

//       // Crear conexión
//       $conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
      
//       // Verificar conexión
//       if ($conn->connect_error) {
//           die("Connection failed: " . $conn->connect_error);
//       }

//       return $conn;
//   }
// }

class Connection {

  private static $instance = null;
  private $connection;
 
  
  // Constructor privado para evitar instanciación externa
  private function __construct() {
      $this->connection = new mysqli('192.168.0.164', 'usuario', 'vital2024.', 'vitalclinic');

      // Comprobar la conexión
      if ($this->connection->connect_error) {
          die("Conexión fallida: " . $this->connection->connect_error);
      }
  }

  // Método para obtener la instancia de la conexión
  public static function getInstance() {
      if (self::$instance == null) {
          self::$instance = new Connection();
      }
      return self::$instance;
  }

  // Método para obtener la conexión
  public function getConnection() {
      return $this->connection;
  }

//   // Evitar la clonación
//   private function __clone() {}

//   // Evitar la deserialización
//   public function __wakeup() {}
}