<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/User.php');
  
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $update = new User($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $update->id = $data->id;

  $update->username = $data->username;
  $update->password = $data->password;

  // Update post
  if($update->update()) {
    echo json_encode(
      array('message' => 'User Updated',
      'data_user_updated' => array(
        'id' => $update->id,
        'username' => $update->username,
        'password' => $update->password
      ))
    );
  } else {
    echo json_encode(
      array('message' => 'User not updated')
    );
  }
