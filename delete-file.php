<?php include 'header.php';?>

<?php
    require 'connection.php';
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
    }
     
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
   
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete a product</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure to delete "<?php echo $name;?>"?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="adminupload.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->

<?php include 'footer.php';?>

  </body>
</html>