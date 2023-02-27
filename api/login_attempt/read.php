<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/Login_Attempt.php');

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog Login_Attempt object
  $login_attempt = new Login($db);

  // Blog Login_Attempt query
  $result = $login_attempt->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any Login_Attempts
  if($num > 0) {
    // Login_Attempt array
    $login_attempt_arr = array();
    // $Login_Attempts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $login_attempt_item = array(
        'id' => $id,
        'user_id' => $user_id,
        'username' => $username,
        'password' => $password,
        'logtime' => $logtime
      );

      // Push to "data"
      array_push($login_attempt_arr, $login_attempt_item);
      // array_push($Login_Attempts_arr['data'], $Login_Attempt_item);
    }

    // Turn to JSON & output
    echo json_encode(
      array('message' => 'Users found!',
      'Data user' => $login_attempt_arr)
    );

  } else {
    // No Login_Attempts
    echo json_encode(
      array('message' => 'No Login_Attempt Found')
    );
  }
