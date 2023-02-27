<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Tujuan.php');
  
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $tujuan = new Tujuan($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to tujuan
  $tujuan->id = $data->id;
  $tujuan->tujuan = $data->tujuan;

  // tujuan post
  if($tujuan->update()) {
    echo json_encode(
      array('message' => 'Tujuan is successfully updated',
      'data_tujuan_updated' => array(
        'id_tujuan' => $tujuan->id,
        'tujuan' => $tujuan->tujuan
      ))
    );
  } else {
    echo json_encode(
      array('message' => 'Tujuan not updated')
    );
  }
