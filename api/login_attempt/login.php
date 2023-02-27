<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  require('backend/db_web.php');
  require('models/Login_Attempt.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog login_attempt object
  $login_attempt = new Login($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $login_attempt->username = $data->username;
  $login_attempt->password = $data->password;

  $login_attempt->login();

  $lastInsertedID = $db->lastInsertId();

  $lastrow = $db->query("SELECT * FROM login_attempt WHERE id=$lastInsertedID")->fetchObject();

  $login_arr = array(
    'id_login' => $lastrow->id,
    'user_id' => $lastrow->user_id,
    'username' => $login_attempt->username,
    'password' => $login_attempt->password,
    'logtime' => $lastrow->logtime,
    'stat' => $lastrow->stat,
  );
 
  if (in_array(NULL,$login_arr)) {
    // Turn to JSON & output
    echo json_encode( 
      array('message' => 'Oops! Username or password is incorrent!')
  );
    } else {
    echo json_encode(
      array('message' => 'User is succesfully logging in',
      'data' => $login_arr)
      );
  }
  
