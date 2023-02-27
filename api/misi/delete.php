<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Misi.php');

  /// Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog misi object
  $misi = new Misi($db);

  // Get raw misi data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $misi->id = $data->id;

  // Delete misi
  if($misi->delete()) {
    echo json_encode(
      array('message' => 'Misi is successfully deleted',
      'data_misi_deleted' => $misi->id)
    );
  } else {
    echo json_encode(
      array('message' => 'Misi is not deleted')
    );
  }
