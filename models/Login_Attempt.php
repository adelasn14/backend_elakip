<?php 
  class Login {
    // DB stuff
    private $conn;
    private $table = 'login_attempt';

    // Login Properties
    public $id;
    public $user_id;
    public $username;
    public $password;
    public $logtime;
    public $stat;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // GET login data
    public function read() {
      // Create query
      $query = 'SELECT u.username as username, u.password as password, l.id, l.user_id, l.logtime
                                FROM ' . $this->table . ' l
                                LEFT JOIN
                                  user u ON l.user_id = u.id
                                ORDER BY
                                  l.logtime DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    
  // DELETE login data
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  public function login() {
    // Create query
    $query = 'INSERT INTO ' . $this->table . ' ( user_id, stat) SELECT u.id, u.password = :password as stat FROM user u
            WHERE EXISTS (SELECT * WHERE username = :username AND password = :password)';

    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->username = htmlspecialchars(strip_tags($this->username));
    $this->password = htmlspecialchars(strip_tags($this->password));

    // Bind data
    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':password', $this->password);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }
    
    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}