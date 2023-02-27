<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
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

  $kegiatan->user_id = $data->user_id;
  $kegiatan->id_misi = $data->id_misi;
  $kegiatan->id_tujuan = $data->id_tujuan;
  $kegiatan->kegiatan = $data->kegiatan;

  if ($kegiatan->create()) {
    $lastInsertedID = $db->lastInsertId();

    $lastrow = $db->query("SELECT * FROM kegiatan WHERE id=$lastInsertedID")->fetchObject();

    $kegiatan_arr = array(
      'id_kegiatan' =>  $lastrow->id,
      'user_id' => $data->user_id,
      'id_misi' => $data->id_misi,
      'id_tujuan' => $data->id_tujuan,
      'kegiatan' => $data->kegiatan,
      'logtime' => $lastrow->logtime
    );

    echo json_encode(
        array('message' => 'Kegiatan is succesfully added',
        'data_kegiatan' => $kegiatan_arr)
        );
    } else {
    // Turn to JSON & output
      echo json_encode(
    array('message' => 'Kegiatan is not added.',
    'data_kegiatan' => $kegiatan_arr)
    );
  }