<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Visi.php');
  
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $update = new Visi($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $update->id = $data->id;

  $update->visi = $data->visi;
  $update->penjabaran_visi = $data->penjabaran_visi;

  // Update post
  if($update->update()) {
    echo json_encode(
      array('message' => 'Visi is successfully updated',
      'data_visi_updated' => array(
        'id_visi' => $update->id,
        'visi' => $update->visi,
        'penjabaran_visi' => $update->penjabaran_visi
      ))
    );
  } else {
    echo json_encode(
      array('message' => 'Visi not updated')
    );
  }
