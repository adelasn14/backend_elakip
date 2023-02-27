<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Kegiatan.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate Kegiatan object
  $kegiatan = new Kegiatan($db);

  // Kegiatan read query
  $result = $kegiatan->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $kegiatan_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $kegiatan_item = array(
            'id_kegiatan' => $id,
            'user_id' => $user_id,
            'username' => $username,
            'id_tujuan' => $id_tujuan,
            'tujuan' => $tujuan,
            'id_misi' => $id_misi,
            'misi' => $misi,
            'kegiatan' => $kegiatan,
            'logtime' => $logtime
          );

          // Push to "data"
          array_push($kegiatan_arr, $kegiatan_item);
        }

        // Turn to JSON & output
        echo json_encode(
          array('message' => 'Kegiatan is found!',
          'data_kegiatan' => $kegiatan_arr)
        );

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No Kegiatan Found')
        );
  }
