<?php
  class User {
    // DB Stuff
    private $conn;
    private $table = 'user';

    // Properties
    public $id;
    public $username;
    public $password;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get categories
    public function read() {
      // Create query
      $query = 'SELECT
        id,
        username,
        password
      FROM
        ' . $this->table . '
      ORDER BY
        id ASC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

      // Get Single User
    public function read_single(){
      // Create query
      $query = 'SELECT
            id,
            username
          FROM
            ' . $this->table . '
        WHERE id = ?
        LIMIT 0,1';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set properties
        $this->id = $row['id'];
        $this->username = $row['username'];
    }

    // Create User
    public function create() {
      // Create Query
      $query = 'INSERT INTO ' . $this->table . ' SET
        username = :username,
        password = :password ';

      // Prepare Statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->username = htmlspecialchars(strip_tags($this->username));
      $this->password = htmlspecialchars(strip_tags($this->password));

      // Bind data
      $stmt-> bindParam(':username', $this->username);
      $stmt-> bindParam(':password', $this->password);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: $s.\n", $stmt->error);

      return false;
      }

    // Update User
    public function update() {
      // Create Query
      $query = 'UPDATE ' .
        $this->table . '
      SET
        username = :username,
        password = :password
        WHERE
        id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->username = htmlspecialchars(strip_tags($this->username));
    $this->password = htmlspecialchars(strip_tags($this->password));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt-> bindParam(':username', $this->username);
    $stmt-> bindParam(':password', $this->password);
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }

    // Delete User
    public function delete() {
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt-> bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }    
}
