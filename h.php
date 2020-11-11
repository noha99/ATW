<html>
<head>
  Wellome to HOME PAGE
</head>

<body>
  <h4>Show Posts</h4>
  <form>
    <?php
    require_once 'connection.php';
    require_once 'userAPI.php';


    // sql to create table
    $sql = " SELECT * FROM puser ";
    $sql2 = " SELECT * FROM Ccomment ";

    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);

    if ($result->num_rows > 0 )
    {
        // output data of each row
        while($row = $result->fetch_assoc()) {

          $userid = $row['UserID'];

          for($i=0 ; $i< sizeof($json) ; $i++)
          {
            if($json[$i]['userID'] == $userid)
            {
              echo "username: " .$json[$i]['username']. "<br>";
            }

          }

        //  echo "UserName : ".$json[0]['username']."<br>";
            echo $row['P_ID'].
            " " . $row['P_Privacy'].
            " " . $row['P_Date']."<br>".
            " " . $row['P_Content']."<br>";


            $ID = $row['P_ID'];
//////////////////////////////////////////////////COMMENT////////////////////////////////////////////
            if ($result2->num_rows > 0)
            {
              while($row2 = $result2->fetch_assoc()) {
                echo "UserName : ".$json[0]['username']."<br>";
                  echo  $row2['C_ID'].
                  " " . $row2['C_Date']."<br>".
                  " " . $row2['C_Content']."<br>";
                }
                ?>
              
                <form action="http://localhost/Wazzaf/delete_commemt_db.php" method="post">
                  COMMENT ID: <br><input type="text" name='id'><br>
                 <input type="submit" name="delete_comment" value="Delete">

                </form>

                <form action="http://localhost/Wazzaf/update_comment_db.php" method="post">
                  COMMENT ID: <br><input type="text" name='id'><br>
                 <input type="submit" name="update_comment" value="UPDATE">

                </form>

    </form>

          <?php
            }
//////////////////////////////////////////////////COMMENT////////////////////////////////////////////

          ?>

            <form action="http://localhost/Wazzaf/delete_post_db.php" method="post">
              Post ID: <br><input type="text" name='id'><br>
             <input type="submit" name="delete_post" value="Delete">

            </form>

           <form action="http://localhost/Wazzaf/update_post_db.php" method="post">
              Post ID: <br>
              <input type="text" name='id'><br>
             <input type="submit" value="UPDATE">

            </form>

            <form action="add_comment.php" method="post">
              Enter Post ID you want to COMMENT: <br>
              <input type="text" name='id'><br>
             <input type="submit" name="add_comm" value="COMMENT">

            </form>
            <?php
        }
    } else {
        echo "0 results";
    }




    $conn->close();
    ?>
  </form>

</body>

</html>
