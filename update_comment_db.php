<html>
<head>
  Wellome to UPDATE PAGE
</head>

<body>
  <h4>Update Comment</h4>
<?php
  require_once 'connection.php';
  //$ID=$_GET["id2"];
  $ID = $_POST["id"];

  $sql = " SELECT * FROM Ccomment WHERE C_ID = $ID ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0)
  {
    echo "Comment you want to UPDATE : <br> <br> " ;
    $row = $result->fetch_assoc();
    echo "Comment ID: ".$row['C_ID']."<br>";
    echo "Comment Content: ".$row['C_Content']."<br>";
    echo "Comment Date: ".$row['C_Date']."<br>"."<br>";
    ?>


    <form action="edit_comment.php" method="post">
      Body: <br>
       <input type="text" name='edit_body' value=<?php echo $row['C_Content'] ?> ><br>
       <input type="submit" name="editt_Comment" value="OK">

    </form>

    <?php

    }
    else
    {
      echo "The Post doesn't exist";
    }

    $conn->close();

?>
</body>
</html>
