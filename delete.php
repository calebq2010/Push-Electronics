<?php
require 'connection.php';
if ( isset($_POST['id'])) {
    // keep track post values
    $id = $_POST['id'];
     
    // delete data
   
    
    $sql = "DELETE FROM products  WHERE id = ?";
    $q = $db->prepare($sql);
    $q->execute(array($id));
    header("Location: adminupload.php");
     
}