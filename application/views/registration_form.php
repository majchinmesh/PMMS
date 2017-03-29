<html>
	<?php
		if (isset($this->session->userdata['logged_in'])) {
			header("location: home");
		}
	?>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
		<div id="main">
			<div id="login">
				<h2>Registration Form</h2>
			
				<hr/>
			
				<?php
					echo "<div class='error_msg'>";
						echo validation_errors();
					echo "</div>";
					
					echo form_open('form_help/new_user_registration');
					
						echo form_label('Create Username : ');
						echo"<br/>";
						echo form_input('username');
						
						echo "<div class='error_msg'>";
							if (isset($message_display)) {
								echo $message_display;
							}
						echo "</div>";
						
						
						echo"<br/>";
						
						
						echo form_label('Email : ');
						echo"<br/>";
							$data = array(
								'type' => 'email',
								'name' => 'email_value'
							);
						
						echo form_input($data);
						
						echo"<br/>";
						echo"<br/>";
						
						
						echo form_label('Password : ');
						echo"<br/>";
						echo form_password('password');
						
						echo"<br/>";
						echo"<br/>";
						
						echo form_submit('submit', 'Sign Up');
					
					echo form_close();
				?>
				<a href="/order_it/login">For Login Click Here</a>
			</div><!-- div login end-->
		</div><!-- div main end-->
	</body>
</html>