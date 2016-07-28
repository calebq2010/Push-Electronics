<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Upload</title>
</head>
<body>

<!-- Uploading images -->

<?php include 'header.php';?>

<div class="container">
	<form id="contact-form" action="upload.php" class="send-img" method="post" enctype="multipart/form-data">
		select image to upload:
		<div class="input-group">
			<label for="file">Images</label>
			<input type="file" id="file" name="fileToUpload" id="fileToUpload">
		</div>
		<div class="form-group">
			<label for="desc">Description</label>
			<input type="text" class="form-control" name="desc" id="desc">
		</div>
		<input type="submit" value="Upload Image" name="submit" class="btn ">
		<img class="mail-loader none" src="img/loader.gif" alt="">
		<span class="none img-fail alert alert-danger">You're message failed to send!</span>
		<span class="none img-success alert alert-success">You're message is on the way!</span>
	</form>
</div>

<?php include "connection.php";?>
<div class="splash none">
	<div class="img-preview">
		<div class="img-large">
			<img src="img/blackiphone6.jpg" alt="">
		</div>
		<div class="description">This is the image description</div>
	</div>
	
</div>

<!-- Images to view and delete -->

<div class="container">
	<div class="row">
		 

		  <?php 
		  $stmh = $db->prepare("SELECT * FROM products");
		  $stmh->execute();
		  while ($img = $stmh->fetch(PDO::FETCH_ASSOC)) {  ?>
				<div class="col-md-4 delete ">
					<form action="delete-file.php" class="clearfix" method="post">
						<input type="hidden" name="id" value="<?php echo $img['id'];?>" >
						<input type="hidden" name="name" value="<?php echo $img['name'];?>" >
						<button type="submit" class="delete-file pull-right" title="Delete">X</button>

					</form>
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





<script>

$('.delete').on('submit'), function() {


}
$('#contact-form').on('submit', function () {
		$('.send-img alert').addClass('none');

		if(validate(this)){
			$('.mail-loader').removeClass('none');
			$.ajax({
				url : 'upload.php',
				data : $(this).serialize(),
				type : 'POST',
				success : function(data) {
					$('.mail-loader').addClass('none');
					if(data === 'success'){
						$('.img-success').removeClass('none');
					}else{
						$('.img-fail').removeClass('none');
					}
				}
			});
		}

		return false;
	});

</script>


<?php include 'footer.php';?>

</body>
</html>