<?php

  require_once 'connection.php';
  $comment = $_POST["add_comment"];
  $id = $_POST['post_id'];
   if(isset($_POST['addcomment']))
  {

    $sql = "INSERT INTO Ccomment (C_Content, P_ID, C_Date )
     VALUES  ('{$conn->real_escape_string($comment)}',
              '{$conn->real_escape_string($id)}',
              CURRENT_TIMESTAMP );";
             //  '".$json[0]['userID']."');";
    $result = mysqli_multi_query($conn,$sql);
	  if ($result) {
        echo "Comment is added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }


?>
