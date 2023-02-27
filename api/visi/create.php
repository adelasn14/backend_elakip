<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Visi.php');
  
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $visi = new Visi($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $visi->user_id = $data->user_id;
  $visi->visi = $data->visi;
  $visi->penjabaran_visi = $data->penjabaran_visi;

  if ($visi->create()) {
    $lastInsertedID = $db->lastInsertId();

    $lastrow = $db->query("SELECT * FROM visi WHERE id=$lastInsertedID")->fetchObject();

    $visi_arr = array(
      'id_visi' =>  $lastrow->id,
      'user_id' => $data->user_id,
      'visi' => $data->visi,
      'penjabaran_visi' => $data->penjabaran_visi,
      'logtime' => $lastrow->logtime
    );
    
    echo json_encode(
        array('message' => 'Visi is succesfully added',
        'data_visi' => $visi_arr)
        );
    } else {
    // Turn to JSON & output
    echo json_encode(
    array('message' => 'Visi is not added.',
    'data_visi' => $visi_arr)
    );  
  }