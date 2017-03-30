<?php

	if(isset($error_message)){
		
		
		echo $error_message ;
	}
	else if (isset($message_display)){
		
		echo $message_display ;
	}
	
	else{
		
		echo form_open('form_help/new_faculty_insert');
	
			$from_input_data = Array(
				
				'Username' => 'username',
				'Password' => 'password',
				'Name' => 'name',
				'Email' => 'email'
				
			
			);
	
			foreach($from_input_data as $name => $value ){ 
			
			?>
				<!-- row start  -->
				<div class="row">
		  			<div class="col-md-4"></div>
		 		 	<div class="col-md-4">
		 
				<?php
			
				$attributes = array(
		        'class' => 'mycustomclass',
		        'style' => 'color: #000;'
				);
		
				echo form_label($name.'  :- ',$value , $attributes);
				
				echo"<br/>";
				
				$data = array(
			        'name'          => $value ,
			        'id'            => $value,
			        'value'         => '',
			        'maxlength'     => '100',
			        'size'          => '50',
			        'style'         => 'width:80%'
				);
		
				echo form_input($data);
			
				?>
			 
			 </div>
			 <div class="col-md-4"></div>
			</div> <!-- row end -->
			<br /><br />	
			
		<?php
	
		} // end of foreach loop 
	
		echo form_submit('faculty_insert', 'Add faculty');
		echo form_close(); 

	}	

?>