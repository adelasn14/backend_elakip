<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Visi.php');

  /// Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog visi object
  $visi = new visi($db);

  // Get raw visi data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $visi->id = $data->id;

  // Delete visi
  if($visi->delete()) {
    echo json_encode(
      array('message' => 'Visi is successfully deleted',
      'data_visi_deleted' => $visi->id)
    );
  } else {
    echo json_encode(
      array('message' => 'Visi is not deleted')
    );
  }
