<?php include 'header.php'; include "connection.php";?>
<div class="splash none">
	<div class="img-preview">
		<div class="img-large">
			<img src="img/blackiphone6.jpg" alt="">
		</div>
		<div class="description">This is the image description</div>
	</div>
	
</div>
<div class="container">
	<div class="row">
		 

		  <?php 
		  $stmh = $db->prepare("SELECT * FROM products");
		  $stmh->execute();
		  while ($img = $stmh->fetch(PDO::FETCH_ASSOC)) {  ?>
				<div class="col-md-4 ">
					<div class="thumbnail">
				      	<img src="img/<?php echo $img['file'];?>">
				    	<div class="caption">
				    		<h3><?php echo $img['name'];?></h3>
				    		<p><?php echo $img['description'];?></p>
			    		</div>
		    		</div>
			  	</div>				
			<?php } ?>
	</div>


	

</div>
<?php include 'footer.php';?>
