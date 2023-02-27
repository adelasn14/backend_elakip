<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Indikator_Target.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate indikator_target object
  $indikator_target = new IndikatorTarget($db);

  // indikator_target read query
  $result = $indikator_target->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $indikator_target_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $indikator_target_item = array(
            'id_indikator_target' => $id,
            'user_id' => $user_id,
            'username' => $username,
            'id_tujuan' => $id_tujuan,
            'tujuan' => $tujuan,
            'target' => $target,
            'indikator' => $indikator,
            'logtime' => $logtime
          );

          // Push to "data"
          array_push($indikator_target_arr, $indikator_target_item);
        }

        // Turn to JSON & output
        echo json_encode(
          array('message' => 'Target found!',
          'data_indikator_target' => $indikator_target_arr)
        );

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No Target Found')
        );
  }
