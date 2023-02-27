<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
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

  $tujuan->user_id = $data->user_id;
  $tujuan->id_misi = $data->id_misi;
  $tujuan->tujuan = $data->tujuan;
  
  if ($tujuan->create()) {
    $lastInsertedID = $db->lastInsertId();

    $lastrow = $db->query("SELECT * FROM tujuan WHERE id=$lastInsertedID")->fetchObject();

    $tujuan_arr = array(
      'id_tujuan' => $lastrow->id,
      'user_id' => $data->user_id,
      'id_misi' => $data->id_misi,
      'tujuan' => $data->tujuan,
      'logtime' => $lastrow->logtime
    );

    echo json_encode(
        array('message' => 'Tujuan is succesfully added',
        'data_tujuan' => $tujuan_arr)
        );
    } else {
    // Turn to JSON & output
      echo json_encode(
    array('message' => 'Tujuan is not added.',
    'data_tujuan' => $tujuan_arr)
    );
  }