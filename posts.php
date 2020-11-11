<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//get all posts
$app->get('/api/posts', function (Request $request, Response $response, array $args) {

  $sql = " SELECT * FROM puser ";
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


//get 1 post
$app->get('/api/post/{id}', function (Request $request, Response $response, array $args) {
  $id = $request->getAttribute('id');

  $sql = " SELECT * FROM puser WHERE P_ID = $id";
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


//Add post
$app->post('/api/post/add', function (Request $request, Response $response, array $args) {
  $P_Content = $request->getParam('P_Content');
  $P_Privacy = $request->getParam('P_Privacy');
//  $P_Date = $request->getParam('P_Date');
//  $UserID = $request->getParam('UserID');

  require 'userAPI.php' ;
  require 'connection.php';

  $sql = " INSERT INTO puser (P_Content, P_Date, P_Privacy, UserID)
            VALUES  ('{$conn->real_escape_string($P_Content)}',
            CURRENT_TIMESTAMP,
            '{$conn->real_escape_string($P_Privacy)}',
            '".$json[0]['userID']."');";
  try {
    require 'connection.php';
    $result = $conn->prepare($sql);
  //  $result->bindValue(':P_Content' , $P_Content);
  //  $result->bindParam(':P_Privacy' , $P_Privacy);
  //  $result->bindParam(':P_Date' , $P_Date);
  //  $result->bindParam(':UserID' , $UserID);

    $result->execute();
    echo '{"notice": {"text": "post added"}';

  } catch (\Exception $e) {
    echo '{"error": {"text": '.$e->getMessage().'}';
  }

    return $response;
});


//Update post
$app->put('/api/post/update/{id}', function (Request $request, Response $response, array $args) {
  $id = $request->getAttribute('id');

  $P_Content = $request->getParam('P_Content');
  $P_Privacy = $request->getParam('P_Privacy');
//  $P_Date = $request->getParam('P_Date');
//  $UserID = $request->getParam('UserID');

  require 'connection.php';

  $sql = "UPDATE puser SET P_Privacy = '{$conn->real_escape_string($P_Privacy)}' where P_ID = $id";
  $sql2 = "UPDATE puser SET P_Content = '{$conn->real_escape_string($P_Content)}' where P_ID = $id";
   $res = mysqli_multi_query($conn,$sql);
   $res2 = mysqli_multi_query($conn,$sql2);
  if ($res&&$res2) {
      //echo "Post updated successfully";

  try {
    require 'connection.php';
    $result = $conn->prepare($sql);
    $result = $conn->prepare($sql2);
  //  $result->bindValue(':P_Content' , $P_Content);
  //  $result->bindParam(':P_Privacy' , $P_Privacy);
  //  $result->bindParam(':P_Date' , $P_Date);
  //  $result->bindParam(':UserID' , $UserID);

    $result->execute();
    echo '{"notice": {"text": "post updated"}';


  } catch (\Exception $e) {
    echo '{"error": {"text": '.$e->getMessage().'}';
  }
}

    return $response;
});


//delete post
$app->delete('/api/post/delete/{id}', function (Request $request, Response $response, array $args) {
  $id = $request->getAttribute('id');

  $sql = "DELETE FROM puser WHERE P_ID = $id";
  $sql2 = "DELETE FROM Ccomment WHERE P_ID = $id ";

  try {
    require 'connection.php';
    $result = $conn->prepare($sql);
    $result2 = $conn->prepare($sql2);

    $result->execute();
    $result2->execute();
    echo '{"notice": {"text": "post deleted"}';
  } catch (\Exception $e) {
    echo '{"error": {"text": '.$e->getMessage().'}}';
  }

    return $response;
});
