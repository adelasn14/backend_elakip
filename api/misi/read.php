<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Misi.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate misi object
  $misi = new Misi($db);

  // misi read query
  $result = $misi->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $misi_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $misi_item = array(
            'id_misi' => $id,
            'user_id' => $user_id,
            'username' => $username,
            'misi' => $misi,
            'logtime' => $logtime,
          );

          // Push to "data"
          array_push($misi_arr, $misi_item);
        }

        // Turn to JSON & output
        echo json_encode(
          array('message' => 'Misi found!',
          'data_misi' => $misi_arr)
        );

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No misi Found')
        );
  }
