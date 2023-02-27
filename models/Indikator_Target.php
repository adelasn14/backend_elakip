<?php
  class IndikatorTarget {
    // DB Stuff
    private $conn;
    private $table = 'indikator_target';

   // Properties
   public $id;
   public $username;
   public $user_id;
   public $id_tujuan;
   public $tujuan;
   public $indikator;
   public $target;
   public $logtime;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get IndikatorTarget
    public function read() {
      // Create query
      $query = 'SELECT u.username as username, i.id, i.user_id, i.id_tujuan, t.tujuan as tujuan, i.indikator, i.target, i.logtime
                FROM ' . $this->table . ' i
                JOIN user u ON i.user_id = u.id
                JOIN tujuan t ON i.id_tujuan = t.id
                ORDER BY i.logtime DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

      // Get Single IndikatorTarget
    public function read_single(){
      // Create query
      $query = 'SELECT u.username as username, i.id, i.user_id, i.id_tujuan, t.tujuan as tujuan, max(i.logtime) as logtime,
                i.indikator, i.target 
                FROM ' . $this->table . ' i
                JOIN user u ON i.user_id = u.id
                JOIN tujuan t ON i.id_tujuan = t.id
                WHERE i.id = ? ORDER BY i.user_id LIMIT 0,1';

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
        $this->indikator = $row['indikator'];
        $this->target = $row['target'];
        $this->logtime = $row['logtime'];
    }

    // Create IndikatorTarget
    public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET user_id = :user_id, id_tujuan = :id_tujuan, target = :target, 
              indikator = :indikator';
  
      $stmt = $this->conn->prepare($query);
  
      // Clean data
      $this->user_id = htmlspecialchars(strip_tags($this->user_id));
      $this->id_tujuan = htmlspecialchars(strip_tags($this->id_tujuan));
      $this->target = htmlspecialchars(strip_tags($this->target));
      $this->indikator = htmlspecialchars(strip_tags($this->indikator));
  
      // Bind data
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->bindParam(':id_tujuan', $this->id_tujuan);
      $stmt->bindParam(':target', $this->target);
      $stmt->bindParam(':indikator', $this->indikator);
      
      // Execute query
      if($stmt->execute()) {
          return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
  
      return false;
    }

    // Update IndikatorTarget
    public function update() {
      // Create Query
      $query = 'UPDATE ' . $this->table . ' SET target = :target, indikator = :indikator WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->target = htmlspecialchars(strip_tags($this->target));
    $this->indikator = htmlspecialchars(strip_tags($this->indikator));
    $this->id = htmlspecialchars(strip_tags($this->id));
    
    // date_default_timezone_set('Asia/Jakarta');
    // $this->logtime = date('Y-m-d H:i:s');

    // Bind data
    $stmt->bindParam(':target', $this->target);
    $stmt->bindParam(':indikator', $this->indikator);
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

    // Delete IndikatorTarget
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
