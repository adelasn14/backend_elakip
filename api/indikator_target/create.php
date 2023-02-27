<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/Indikator_Target.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $indikator_target = new IndikatorTarget($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $indikator_target->user_id = $data->user_id;
  $indikator_target->id_tujuan = $data->id_tujuan;
  $indikator_target->indikator = $data->indikator;
  $indikator_target->target = $data->target;

  if ($indikator_target->create()) {
    $lastInsertedID = $db->lastInsertId();

    $lastrow = $db->query("SELECT * FROM indikator_target WHERE id=$lastInsertedID")->fetchObject();

    $indikator_target_arr = array(
      'id_indikator_target' =>  $lastrow->id,
      'user_id' => $data->user_id,
      'id_tujuan' => $data->id_tujuan,
      'indikator' => $data->indikator,
      'target' => $data->target,
      'logtime' => $lastrow->logtime
    );

    echo json_encode(
        array('message' => 'Target is succesfully added',
        'data_indikator_target' => $indikator_target_arr)
        );
    } else {
    // Turn to JSON & output
      echo json_encode(
      array('message' => 'Target is not added.',
      'data_indikator_target' => $indikator_target_arr)
      );
  }