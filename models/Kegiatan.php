<?php
  class Kegiatan {
    // DB Stuff
    private $conn;
    private $table = 'kegiatan';

   // Properties
   public $id;
   public $username;
   public $user_id;
   public $id_misi;
   public $misi;
   public $id_tujuan;
   public $tujuan;
   public $kegiatan;
   public $logtime;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Kegiatan
    public function read() {
      // Create query
      $query = 'SELECT u.username as username, k.id, k.user_id, k.id_tujuan, k.id_misi, t.tujuan as tujuan, m.misi as misi,
                k.kegiatan, k.logtime FROM ' . $this->table . ' k
                JOIN user u ON k.user_id = u.id
                JOIN tujuan t ON k.id_tujuan = t.id
                JOIN misi m ON k.id_misi = m.id 
                ORDER BY k.logtime DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

      // Get Single Kegiatan
    public function read_single(){
      // Create query
      $query = 'SELECT u.username as username, k.id, k.user_id, k.id_tujuan, k.id_misi, t.tujuan as tujuan, m.misi as misi,
                max(k.logtime) as logtime, k.kegiatan FROM ' . $this->table . ' k
                JOIN user u ON k.user_id = u.id
                JOIN misi m ON k.id_misi = m.id
                JOIN tujuan t ON k.id_tujuan = t.id
                WHERE k.id = ? ORDER BY k.user_id LIMIT 0,1';

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
        $this->id_tujuan = $row['id_tujuan'];
        $this->tujuan = $row['tujuan'];
        $this->id_misi = $row['id_misi'];
        $this->misi = $row['misi'];
        $this->kegiatan = $row['kegiatan'];
        $this->logtime = $row['logtime'];
    }

    // Create Kegiatan
    public function create() {
      // Create query
      $query = 'INSERT IGNORE INTO ' . $this->table . ' SET 
                user_id = :user_id,
                id_tujuan = :id_tujuan,
                id_misi = :id_misi,
                kegiatan = :kegiatan';
  
      $stmt = $this->conn->prepare($query);
  
      // Clean data
      $this->user_id = htmlspecialchars(strip_tags($this->user_id));
      $this->id_misi = htmlspecialchars(strip_tags($this->id_misi));
      $this->id_tujuan = htmlspecialchars(strip_tags($this->id_tujuan));
      $this->kegiatan = htmlspecialchars(strip_tags($this->kegiatan));
  
      // Bind data
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->bindParam(':id_tujuan', $this->id_tujuan);
      $stmt->bindParam(':kegiatan', $this->kegiatan);
      $stmt->bindParam(':id_misi', $this->id_misi);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    // Update Kegiatan
    public function update() {
      // Create Query
      $query = 'UPDATE ' . $this->table . ' SET kegiatan = :kegiatan
                WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kegiatan = htmlspecialchars(strip_tags($this->kegiatan));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':kegiatan', $this->kegiatan);
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }

    // Delete Kegiatan
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
