<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  require('backend/db_web.php');
  require('models/User.php');
  
  /// Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog user object
  $user = new User($db);

  // Get raw user data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $user->id = $data->id;

  // Delete user
  if($user->delete()) {
    echo json_encode(
      array('message' => 'User is successfully deleted',
      'data_user_deleted' => $user->id)
    );
  } else {
    echo json_encode(
      array('message' => 'User is not deleted')
    );
  }
