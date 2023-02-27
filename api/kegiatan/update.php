<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Kegiatan.php');
  
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $kegiatan = new Kegiatan($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to Kegiatan
  $kegiatan->id = $data->id;
  $kegiatan->kegiatan = $data->kegiatan;

  // Kegiatan post
  if($kegiatan->update()) {
    echo json_encode(
      array('message' => 'Kegiatan is successfully updated',
      'data_kegiatan_updated' => array(
        'id_kegiatan' => $kegiatan->id,
        'kegiatan' => $kegiatan->kegiatan
      ))
    );
  } else {
    echo json_encode(
      array('message' => 'Kegiatan not updated')
    );
  }
