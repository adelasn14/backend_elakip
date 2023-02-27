<?php
  class Tujuan {
    // DB Stuff
    private $conn;
    private $table = 'tujuan';

   // Properties
   public $id;
   public $username;
   public $user_id;
   public $id_misi;
   public $misi;
   public $tujuan;
   public $logtime;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Tujuan
    public function read() {
      // Create query
      $query = 'SELECT u.username as username, t.id, t.user_id, t.id_misi, m.misi as misi, t.tujuan, t.logtime
                FROM ' . $this->table . ' t
                JOIN user u ON t.user_id = u.id
                JOIN misi m ON t.id_misi = m.id
                ORDER BY t.logtime DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

      // Get Single Tujuan
    public function read_single(){
      // Create query
      $query = 'SELECT u.username as username, t.id, t.user_id, t.id_misi, m.misi as misi, max(t.logtime) as logtime, t.tujuan
            FROM ' . $this->table . ' t
            JOIN user u ON t.user_id = u.id
            JOIN misi m ON t.id_misi = m.id
            WHERE t.id = ?
            ORDER BY t.user_id LIMIT 0,1';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set properties
        $this->username = $row['username'];
        $this->id = $row['id'];
        $this->user_id = $row['user_id'];
        $this->id_misi = $row['id_misi'];
        $this->misi = $row['misi'];
        $this->tujuan = $row['tujuan'];
        $this->logtime = $row['logtime'];
    }

    // Create Tujuan
    public function create() {
      // Create query
      $query = 'INSERT IGNORE INTO ' . $this->table . ' SET 
                user_id = :user_id,
                id_misi = :id_misi,
                tujuan = :tujuan';
  
      $stmt = $this->conn->prepare($query);
  
      // Clean data
      $this->user_id = htmlspecialchars(strip_tags($this->user_id));
      $this->id_misi = htmlspecialchars(strip_tags($this->id_misi));
      $this->tujuan = htmlspecialchars(strip_tags($this->tujuan));
  
      // Bind data
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->bindParam(':id_misi', $this->id_misi);
      $stmt->bindParam(':tujuan', $this->tujuan);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
  
      return false;
    }

    // Update Tujuan
    public function update() {
      // Create Query
      $query = 'UPDATE ' . $this->table . ' SET tujuan = :tujuan
        WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->tujuan = htmlspecialchars(strip_tags($this->tujuan));
    $this->id = htmlspecialchars(strip_tags($this->id));
    
    // date_default_timezone_set('Asia/Jakarta');
    // $this->logtime = date('Y-m-d H:i:s');

    // Bind data
    $stmt-> bindParam(':tujuan', $this->tujuan);
    $stmt-> bindParam(':id', $this->id);
    // $stmt-> bindParam(':logtime', $this->logtime);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);
    return false;
    }

    // Delete Tujuan
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
