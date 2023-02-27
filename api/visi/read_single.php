<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Visi.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog visi object
  $visi = new Visi($db);

  // Get ID
  $visi->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $visi->read_single();

  // Create array
  $visi_arr = array(
    'id_visi' => $visi->id,
    'user_id' => $visi->user_id,
    'username' => $visi->username,
    'visi' => $visi->visi,
    'penjabaran_visi' => $visi->penjabaran_visi,
    'logtime' => $visi->logtime
    );

  // Make JSON
  print_r(json_encode($visi_arr));
