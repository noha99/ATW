<?php
/*  require_once 'connection.php';

  $body = $_POST["add_body"];
  $privacy = $_POST["add_privacy"];
*/

//  if(isset($_POST['save_post']))
//  {
    $api_url='http://www.mocky.io/v2/5cb999bc3000004913bfa593';//.$id;
    $api_json=file_get_contents($api_url);
    $json=json_decode($api_json,TRUE);



  /*  foreach ($json as $character)
    {
	     echo "UserName : " .$character['username']. "<br>";
    }*/


//  }
?>
