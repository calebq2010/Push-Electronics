<?php include 'header.php';?>


<div class="container">

	<div class="col-md-9">
		
		<form id="contact-form" class="content clearfix" method="POST" action="email.php">
			
			<h1 class="pagetitle">Contact us</h1>
				
				<div class="note">
					<p>We are here to answer any questions you may have about our services or your issues. Reach out to us and we'll respond as soon as we can. Please describe the problem or question you have below in the message section!</p>
				</div>
				
				<div class="form-group email">
					<label for="email">
						Email: 
		  				<span class="required">*</span>
		  				<span class="field-error none">Please provide email!</span>
		  			</label>	
		  			<input type="text" class="form-control" placeholder="Email" id="email" name="email">
				</div>
				
				<div class="form-group name">
					<label for="name">Name:		
			  			<span class="required">*</span>
		  				<span class="field-error none">Please provide name!</span>
			  		</label>
			  			<input type="text" class="form-control" placeholder="Name" id="name" name="name">
				</div>


				<div class="form-group message">
					<label for="message">Message: 
						<span class="required">*</span>
		  				<span class="field-error none">Please provide message!</span>
					</label>
				 		<textarea class="form-control" rows="5" id="message" name="message"></textarea>
				</div>
					
				<div class="submit-btn send-mail form-group pull-right">
					<img class="mail-loader none" src="img/loader.gif" alt="">
					<span class="none mail-fail alert alert-danger">You're message failed to send!</span>
					<span class="none mail-success alert alert-success">You're message is on the way!</span>
					<input type="submit" class="btn btn-default btn-lg" value="SEND">
				</div>
				
		</form>
	</div>
	<div class="col-md-3">

		<ul class="list-group hours">
			<li class="list-group-item active"><h4>Hours that we are open!</h4></li>
			<li class="list-group-item">Monday 10:00 am - 7:00 pm EST</li>
			<li class="list-group-item">Tuesday 10:00 am - 7:00 pm EST</li>
			<li class="list-group-item">Wednesday 10:00 am - 7:00 pm EST</li>
			<li class="list-group-item">Thursday 10:00 am - 7:00 pm EST</li>
			<li class="list-group-item">Friday 10:00 am - 7:00 pm EST</li>
			<li class="list-group-item">Saturday 10:00 am - 7:00 pm EST</li>
			<li class="list-group-item">Sunday Closed</li>
		</ul>
	</div>

</div>



<script>
	$('#contact-form').on('submit', function () {
		$('.send-mail alert').addClass('none');

		if(validate(this)){
			$('.mail-loader').removeClass('none');
			$.ajax({
				url : 'email.php',
				data : $(this).serialize(),
				type : 'POST',
				success : function(data) {
					$('.mail-loader').addClass('none');
					if(data === 'success'){
						$('.mail-success').removeClass('none');
					}else{
						$('.mail-fail').removeClass('none');
					}
				}
			});
		}

		return false;
	});


	function validate(form) {
		var error;
		$('.field-error').addClass('none');


		if(form.name.value === ''){
			error = true;
			$('.name .field-error').removeClass('none');
		}

		if(form.email.value === ''){
			error = true;
			$('.email .field-error').removeClass('none');
		}

		if(form.message.value === ''){
			error = true;
			$('.message .field-error').removeClass('none');
		}

		if(error)
			return false;
		else
			return true;
	}
</script>



<?php include 'footer.php';?>