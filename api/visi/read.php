<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Visi.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate Visi object
  $visi = new Visi($db);

  // Visi read query
  $result = $visi->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $visi_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $visi_item = array(
            'id_visi' => $id,
            'user_id' => $user_id,
            'username' => $username,
            'visi' => $visi,
            'penjabaran_visi' => $penjabaran_visi,
            'logtime' => $logtime
          );

          // Push to "data"
          array_push($visi_arr, $visi_item);
        }

        // Turn to JSON & output
        echo json_encode(
          array('message' => 'Visi is found!',
          'data_visi' => $visi_arr)
        );

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No visi Found')
        );
  }
