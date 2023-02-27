<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Indikator_Target.php');

  /// Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Indikator_Target object
  $indikator_target = new IndikatorTarget($db);

  // Get raw Indikator_Target data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $indikator_target->id = $data->id;

  // Delete Indikator_Target
  if($indikator_target->delete()) {
    echo json_encode(
      array('message' => 'Target is successfully deleted',
      'data_target_deleted' => $indikator_target->id)
    );
  } else {
    echo json_encode(
      array('message' => 'Target is not deleted')
    );
  }
