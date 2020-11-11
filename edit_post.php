<?php

  require_once 'connection.php';
  $privacy = $_POST["edit_privacy"];
  $body = $_POST["edit_body"];

  $id = $_POST['bn'];

   if(isset($_POST['editt_post']))
  {
    $sql = "UPDATE puser SET P_Privacy = '{$conn->real_escape_string($privacy)}' where P_ID = $id";
    $sql2 = "UPDATE puser SET P_Content = '{$conn->real_escape_string($body)}' where P_ID = $id";
     $result = mysqli_multi_query($conn,$sql);
     $result2 = mysqli_multi_query($conn,$sql2);
	  if ($result&&$result2) {
        echo "Post updated successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
?>
