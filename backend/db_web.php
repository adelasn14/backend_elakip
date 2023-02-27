<?php 
  class Database {
    // DB Params
    private $conn;

    // DB Connect
    public function connect() : PDO {
      $this->conn = null;

      try { 
        $username = getenv('DB_USER'); // e.g. 'your_db_user'
        $password = getenv('DB_PASS'); // e.g. 'your_db_password'
        $dbName = getenv('DB_NAME'); // e.g. 'your_db_name'
        $instanceUnixSocket = getenv('INSTANCE_UNIX_SOCKET'); // e.g. '/cloudsql/project:region:instance'

        // Connect using UNIX sockets
        $dsn = sprintf(
            'mysql:dbname=%s;unix_socket=%s',
            $dbName,
            $instanceUnixSocket
        );
        
        $this->conn = new PDO($dsn, $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }