<?php
  require_once 'connection.php';

  //$ID=$_GET["id2"];

  $ID = $_POST["id"];

  $sql = " SELECT * FROM Ccomment WHERE C_ID = $ID ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0)
  {
    if(isset($_POST['delete_comment']))
    {
      $sql2 = "DELETE FROM Ccomment WHERE C_ID = $ID ";

      $result2 = mysqli_multi_query($conn,$sql2);

      if ($result2) {
          echo "comment is deleted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }else {
        echo "The comment no longer exists";
  }
//  header("Location:http://localhost/Wazzaf/h.php");

  $conn->close();
?>
