<html>
<head>
  Wellome to UPDATE PAGE
</head>

<body>
  <h4>Update Posts</h4>
<?php
  require_once 'connection.php';
  //$ID=$_GET["id2"];
  $ID = $_POST["id"];

  $sql = " SELECT * FROM puser WHERE P_ID = $ID ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0)
  {
    echo "Post you want to UPDATE : <br> <br> " ;
    $row = $result->fetch_assoc();
    echo "Post ID: ".$row['P_ID']."<br>";
    echo "Post Privacy: ".$row['P_Privacy']."<br>";
    echo "Post Content: ".$row['P_Content']."<br>";
    echo "Post Date: ".$row['P_Date']."<br>"."<br>";
    ?>


    <form action="edit_post.php" method="post">
       Privacy:<br>
       <input type="text" name="bn" value="<?php echo $ID ?>" hidden>
       <input type="text" list="browsers" name="edit_privacy" value= <?php echo $row['P_Privacy'] ?>/>
        <datalist id="browsers">
            <option value="Public">
            <option value="Followers">
            <option value="Followers of Followers">
            <option value="Just Me">
        </datalist>
        <br>
       Body: <br>
       <input type="text" name='edit_body' value=<?php echo $row['P_Content'] ?> ><br>
       <input type="submit" name="editt_post" value="OK">

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
