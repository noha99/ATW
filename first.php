<html>
<head>
  Wellome to HOME PAGE
</head>

<body>


  <h4>ADD Post</h4>
  <form action="http://localhost/Wazzaf/save_post_db.php" method="post">
   Privacy:<br>
   <input type="text" list="browsers" name="add_privacy"/>
    <datalist id="browsers">
        <option value="Public">
        <option value="Followers">
        <option value="Followers of Followers">
        <option value="Just Me">
    </datalist>
    <br>
   Body: <br>
   <input type="text" name='add_body' ><br>
   <input type="submit" name="save_post" value="ADD">

  </form>


</body>

</html>
