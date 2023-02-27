<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require('backend/db_web.php');
  require('models/User.php');
  
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate user object
  $user = new User($db);

  // User read query
  $result = $user->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $user_arr = array();
        $user_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $user_item = array(
            'id' => $id,
            'username' => $username,
            'password' => $password
          );

          // Push to "data"
          array_push($user_arr['data'], $user_item);
        }

        // Turn to JSON & output
        echo json_encode($user_arr);

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No user Found')
        );
  }
