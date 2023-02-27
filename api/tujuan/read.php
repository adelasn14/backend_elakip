<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Tujuan.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate Tujuan object
  $tujuan = new Tujuan($db);

  // Tujuan read query
  $result = $tujuan->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $tujuan_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $tujuan_item = array(
            'id_tujuan' => $id,
            'user_id' => $user_id,
            'username' => $username,
            'id_misi' => $id_misi,
            'misi' => $misi,
            'tujuan' => $tujuan,
            'logtime' => $logtime,
            );

          // Push to "data"
          array_push($tujuan_arr, $tujuan_item);
        }

        // Turn to JSON & output
        echo json_encode(
          array('message' => 'Tujuan is found!',
          'data_tujuan' => $tujuan_arr)
        );

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No Tujuan Found')
        );
  }
