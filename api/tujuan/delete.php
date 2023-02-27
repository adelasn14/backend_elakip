<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Tujuan.php');

  /// Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Tujuan object
  $tujuan = new Tujuan($db);

  // Get raw Tujuan data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $tujuan->id = $data->id;

  // Delete Tujuan
  if($tujuan->delete()) {
    echo json_encode(
      array('message' => 'Tujuan is successfully deleted',
      'data_tujuan_deleted' => $tujuan->id)
    );
  } else {
    echo json_encode(
      array('message' => 'Tujuan is not deleted')
    );
  }
