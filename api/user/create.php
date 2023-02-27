<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/User.php');
  
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $user = new User($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $user->username = $data->username;
  $user->password = $data->password;

  // Create user
  if($user->create()) {
    echo json_encode(
      array('message' => 'User successfully created!',
      'data_user' => array(
        'username' => $data->username,
        'password' => $data->password
      ))
    );
  } else {
    echo json_encode(
      array('message' => 'User is not created.')
    );
  }
