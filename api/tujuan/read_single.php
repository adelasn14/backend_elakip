<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Tujuan.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Tujuan object
  $tujuan = new Tujuan($db);

  // Get ID
  $tujuan->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $tujuan->read_single();

  // Create array
  $tujuan_arr = array(
    'id_tujuan' => $tujuan->id,
    'user_id' => $tujuan->user_id,
    'username' => $tujuan->username,
    'id_misi' => $tujuan->id_misi,
    'misi' => $tujuan->misi,
    'tujuan' => $tujuan->tujuan,
    'logtime' => $tujuan->logtime
  );

  // Make JSON
  print_r(json_encode($tujuan_arr));
