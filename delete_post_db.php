<?php
  require_once 'connection.php';

  //$ID=$_GET["id2"];

  $ID = $_POST["id"];

  $sql = " SELECT * FROM puser WHERE P_ID = $ID ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0)
  {
    if(isset($_POST['delete_post']))
    {
      $sql = "DELETE FROM puser WHERE P_ID = $ID ";
      $sql2 = "DELETE FROM Ccomment WHERE P_ID = $ID ";

      $result = mysqli_multi_query($conn,$sql);
      $result2 = mysqli_multi_query($conn,$sql2);


      if ($result1&&$result2) {
          echo "Post is deleted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }else {
        echo "The Post no longer exists";
  }
//  header("Location:http://localhost/Wazzaf/h.php");

  $conn->close();
?>
