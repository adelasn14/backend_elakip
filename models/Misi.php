<?php
  class Misi {
    // DB Stuff
    private $conn;
    private $table = 'misi';

   // Properties
   public $id;
   public $username;
   public $user_id;
   public $misi;
   public $logtime;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get misi
    public function read() {
      // Create query
      $query = 'SELECT u.username as username, v.id, v.user_id, v.logtime, v.misi
                FROM ' . $this->table . ' v
                LEFT JOIN user u ON v.user_id = u.id
                ORDER BY v.logtime DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

      // Get Single misi
    public function read_single(){
      // Create query
      $query = 'SELECT u.username as username, v.id, v.user_id, max(v.logtime) as logtime, v.misi
                FROM user u LEFT JOIN ' . $this->table . ' v
                ON u.id=v.user_id
                WHERE v.id = ?
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
        $this->user_id = $row['user_id'];
        $this->logtime = $row['logtime'];
        $this->misi = $row['misi'];
    }

    
    // Create misi
    public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET 
                user_id = :user_id,
                misi = :misi';
  
      $stmt = $this->conn->prepare($query);
  
      
      $this->user_id = htmlspecialchars(strip_tags($this->user_id));
      $this->misi = htmlspecialchars(strip_tags($this->misi));
  
      // Bind data
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->bindParam(':misi', $this->misi);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
  
      return false;
    }

    // Update misi
    public function update() {
      // Create Query
      $query = 'UPDATE ' .
        $this->table . '
      SET
        misi = :misi
        WHERE
        id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->misi = htmlspecialchars(strip_tags($this->misi));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt-> bindParam(':misi', $this->misi);
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }

    // Delete misi
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
