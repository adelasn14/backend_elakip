<?php
  class Visi {
    // DB Stuff
    private $conn;
    private $table = 'visi';

   // Properties
   public $id;
   public $username;
   public $user_id;
   public $visi;
   public $penjabaran_visi;
   public $logtime;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Visi
    public function read() {
      // Create query
      $query = 'SELECT u.username as username, v.id, v.user_id, v.logtime, v.visi, v.penjabaran_visi
                FROM ' . $this->table . ' v
                LEFT JOIN user u ON v.user_id = u.id
                ORDER BY v.logtime DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

      // Get Single Visi
    public function read_single(){
      // Create query
      $query = 'SELECT u.username as username, v.id, v.user_id, max(v.logtime) as logtime, v.visi, v.penjabaran_visi
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
        $this->visi = $row['visi'];
        $this->penjabaran_visi = $row['penjabaran_visi'];
    }

    // Create Visi
    public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET 
                user_id = :user_id,
                visi = :visi,
                penjabaran_visi = :penjabaran_visi ';
  
      $stmt = $this->conn->prepare($query);
  
      // Clean data
      $this->user_id = htmlspecialchars(strip_tags($this->user_id));
      $this->visi = htmlspecialchars(strip_tags($this->visi));
      $this->penjabaran_visi = htmlspecialchars(strip_tags($this->penjabaran_visi));
  
      // Bind data
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->bindParam(':visi', $this->visi);
      $stmt->bindParam(':penjabaran_visi', $this->penjabaran_visi);
      
      // Execute query
      if($stmt->execute()) {
          return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
  
      return false;
    }

    // Update Visi
    public function update() {
      // Create Query
      $query = 'UPDATE ' .
        $this->table . '
      SET
        visi = :visi,
        penjabaran_visi = :penjabaran_visi
        WHERE
        id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->visi = htmlspecialchars(strip_tags($this->visi));
    $this->penjabaran_visi = htmlspecialchars(strip_tags($this->penjabaran_visi));
    $this->id = htmlspecialchars(strip_tags($this->id));
    
    // date_default_timezone_set('Asia/Jakarta');
    // $this->logtime = date('Y-m-d H:i:s');

    // Bind data
    $stmt-> bindParam(':visi', $this->visi);
    $stmt-> bindParam(':penjabaran_visi', $this->penjabaran_visi);
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

    // Delete Visi
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
