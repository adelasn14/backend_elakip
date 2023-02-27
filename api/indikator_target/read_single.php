<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Indikator_Target.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Tujuan object
  $indikator_target = new IndikatorTarget($db);

  // Get ID
  $indikator_target->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $indikator_target->read_single();

  // Create array
  $indikator_target_arr = array(
    'id_indikator_target' => $indikator_target->id,
    'user_id' => $indikator_target->user_id,
    'username' => $indikator_target->username,
    'id_tujuan' => $indikator_target->id_tujuan,
    'tujuan' => $indikator_target->tujuan,
    'target' => $indikator_target->target,
    'indikator' => $indikator_target->indikator,
    'logtime' => $indikator_target->logtime
  );

  // Make JSON
  print_r(json_encode($indikator_target_arr));
