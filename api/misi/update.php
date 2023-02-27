<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Misi.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $update = new Misi($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $update->id = $data->id;
  $update->misi = $data->misi;

  // Update post
  if($update->update()) {
    echo json_encode(
      array('message' => 'Misi Updated',
      'data_misi_updated' => array(
        'id_misi' => $update->id,
        'misi' => $update->misi
      ))
    );
  } else {
    echo json_encode(
      array('message' => 'Misi not updated')
    );
  }
