<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Misi.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $misi = new Misi($db);

 // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $misi->user_id = $data->user_id;
  $misi->misi = $data->misi;
  
  if ($misi->create()) {
    $lastInsertedID = $db->lastInsertId();

    $lastrow = $db->query("SELECT * FROM misi WHERE id=$lastInsertedID")->fetchObject();
    
    $misi_arr = array(
      'id_misi' => $lastrow->id,
      'user_id' => $data->user_id,
      'misi' => $data->misi,
      'logtime' => $lastrow->logtime,
    );

    echo json_encode(
        array('message' => 'Misi is succesfully added',
        'data_misi' => $misi_arr)
        );
    } else {
    // Turn to JSON & output
    echo json_encode(
    array('message' => 'Misi is not added.',
    'data_misi' => $misi_arr)
    );  
  }