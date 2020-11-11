<html>
<head>
  Welcome to COMMENT PAGE
</head>

<body>
  <h4>COMMENT on Post</h4>
<?php
  require_once 'connection.php';

  $ID = $_POST["id"];

  $sql = " SELECT * FROM puser WHERE P_ID = $ID ";

  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
     if(isset($_POST['add_comm']))
	 {
        echo "Post you want to COMMENT on : <br> <br> " ;
        $row = $result->fetch_assoc();
        echo "Post ID: ".$row['P_ID']."<br>";
    		echo "Post Privacy: ".$row['P_Privacy']."<br>";
    		echo "Post Content: ".$row['P_Content']."<br>";
    		echo "Post Date: ".$row['P_Date']."<br>"."<br>";
    		?>
    		 <form action="add_comment_db.php" method="post">

           ADD COMMENT: <br><input type="text" name='add_comment' ><br>
		       <input type="text" name="post_id" value="<?php echo $ID ?>" hidden>
           <input type="submit" name="addcomment" value="OK">

        </form>



   <?php

	 }
  }
  else
  {
    echo "The Post doesn't exist";
  }

    $conn->close();

?>
</body>
</html>
