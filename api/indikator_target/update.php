<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Indikator_Target.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $indikator_target = new IndikatorTarget($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to indikator_target
  $indikator_target->id = $data->id;
  $indikator_target->indikator = $data->indikator;
  $indikator_target->target = $data->target;

  // indikator_target post
  if($indikator_target->update()) {
    echo json_encode(
      array('message' => 'Target is successfully updated',
      'data_indikator_target_updated' => array(
        'id_indikator_target' => $indikator_target->id,
        'indikator' => $indikator_target->indikator,
        'target' => $indikator_target->target
      ))
    );
  } else {
    echo json_encode(
      array('message' => 'Target not updated')
    );
  }
