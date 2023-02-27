<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Kegiatan.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Tujuan object
  $kegiatan = new Kegiatan($db);

  // Get ID
  $kegiatan->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $kegiatan->read_single();

  // Create array
  $kegiatan_arr = array(
    'id_kegiatan' => $kegiatan->id,
    'user_id' => $kegiatan->user_id,
    'username' => $kegiatan->username,
    'id_tujuan' => $kegiatan->id_tujuan,
    'tujuan' => $kegiatan->tujuan,
    'id_misi' => $kegiatan->id_misi,
    'misi' => $kegiatan->misi,
    'kegiatan' => $kegiatan->kegiatan,
    'logtime' => $kegiatan->logtime
  );

  // Make JSON
  print_r(json_encode($kegiatan_arr));
