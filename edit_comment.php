<?php

  require_once 'connection.php';
  $body = $_POST["edit_body"];

  $id = $_POST['bn'];

   if(isset($_POST['editt_Comment']))
  {
    $sql2 = "UPDATE Ccomment SET C_Content = '{$conn->real_escape_string($body)}' WHERE C_ID = $id ;";
     $result2 = mysqli_multi_query($conn,$sql2);
	  if ($result2) {
        echo "Post updated successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
?>
