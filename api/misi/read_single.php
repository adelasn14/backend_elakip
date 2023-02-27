<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Misi.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog misi object
  $misi = new Misi($db);

  // Get ID
  $misi->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $misi->read_single();

  // Create array
  $misi_arr = array(
    'id_misi' => $misi->id,
    'user_id' => $misi->user_id,
    'username' => $misi->username,
    'misi' => $misi->misi,
    'logtime' => $misi->logtime
    );

  // Make JSON
  print_r(json_encode($misi_arr));
