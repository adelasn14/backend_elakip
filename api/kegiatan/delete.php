<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Kegiatan.php');

  /// Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Kegiatan object
  $kegiatan = new Kegiatan($db);

  // Get raw Kegiatan data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $kegiatan->id = $data->id;

  // Delete Kegiatan
  if($kegiatan->delete()) {
    echo json_encode(
      array('message' => 'Kegiatan is successfully deleted',
      'data_kegiatan_deleted' => $kegiatan->id)
    );
  } else {
    echo json_encode(
      array('message' => 'Kegiatan is not deleted')
    );
  }
