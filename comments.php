<?php

require 'vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//get all comments of exact post
$app->get('/api/show_comments/{id}', function (Request $request, Response $response, array $args) {
  $id = $request->getAttribute('id');

  $sql = " SELECT * FROM Ccomment WHERE P_ID = $id";
  try {
    require 'connection.php';
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo json_encode($row);
        }
    }
  } catch (\Exception $e) {
    echo '{"error": {"text": '.$e->getMessage().'}}';
  }

    return $response;
});

//get 1 comment
$app->get('/api/show_comment/{id}', function (Request $request, Response $response, array $args) {
  $id = $request->getAttribute('id');

  $sql = " SELECT * FROM Ccomment WHERE C_ID = $id";
  try {
    require 'connection.php';
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo json_encode($row);
        }
    }
  } catch (\Exception $e) {
    echo '{"error": {"text": '.$e->getMessage().'}}';
  }

    return $response;
});



//Add comment to a post
$app->post('/api/comment/add/{id}', function (Request $request, Response $response, array $args) {
  $C_Content = $request->getParam('C_Content');
  $id = $request->getAttribute('id');

  require 'userAPI.php' ;
  require 'connection.php';


  $sql = " INSERT INTO Ccomment (C_Content, C_Date, P_ID, UserID)
            VALUES  ('{$conn->real_escape_string($C_Content)}',
            CURRENT_TIMESTAMP,
            '{$conn->real_escape_string($id)}',
            '".$json[0]['userID']."');";
  try {
    require 'connection.php';
    $result = $conn->prepare($sql);

    $result->execute();
    echo '{"notice": {"text": "post added"}';

  } catch (\Exception $e) {
    echo '{"error": {"text": '.$e->getMessage().'}';
  }

    return $response;
});



//Update comment
$app->put('/api/comment/update/{id}', function (Request $request, Response $response, array $args) {
  $id = $request->getAttribute('id');

  $C_Content = $request->getParam('C_Content');

  require 'connection.php';

   $sql = "UPDATE Ccomment SET C_Content = '{$conn->real_escape_string($C_Content)}' where C_ID = $id";
   $res = mysqli_multi_query($conn,$sql);


  try {
    require 'connection.php';
    $result = $conn->prepare($sql);


    $result->execute();
    echo '{"notice": {"text": "post updated"}';


  } catch (\Exception $e) {
    echo '{"error": {"text": '.$e->getMessage().'}';
  }


    return $response;
});


//delete post
$app->delete('/api/comment/delete/{id}', function (Request $request, Response $response, array $args) {
  $id = $request->getAttribute('id');

  $sql = "DELETE FROM Ccomment WHERE C_ID = $id ";

  try {
    require 'connection.php';
    $result = $conn->prepare($sql);

    $result->execute();
    echo '{"notice": {"text": "post deleted"}';
  } catch (\Exception $e) {
    echo '{"error": {"text": '.$e->getMessage().'}}';
  }

    return $response;
});
