<?php

	if(isset($error_message)){
		
		
		echo '<h2>'.$error_message.'</h2>';
	}
	else if (isset($message_display)){
		
		echo '<h2>'.$message_display.'</h2>' ;
		
	}
	
	else{
		?>		



			<div class="row">
					  			<div class="col-md-2"></div>
					  			
					  			<div class="col-md-2"><h3><b>Sid</b></h3></div>
					  			<div class="col-md-2"><h3><b>Roll</b></h3></div>
					  			<div class="col-md-3"><h3><b>Name</b></h3></div>
					  			<div class="col-md-1"><h3><b>Delete</b></h3></div>
					  			
					 		 	<div class="col-md-2"></div>
			
			</div>
			<hr  style="border-width: 5px;">
			<br />
			<br />



		<?php
		echo form_open('form_help/student_delete');
	
			foreach($student_list as $s_id => $s_data ){ 
			
			
			?>
				
				
		  		
		  		<div class="row">	
		  			<div class="col-md-2"></div>
		 		 	<div class="col-md-2"><h4>
			
			<?php
					echo $s_id ;
			?>
					</h4></div>
					<div class="col-md-2"><h4>
			<?php
			
					echo $s_data['roll'];
			?>				
					</h4></div>
					<div class="col-md-3"><h4>
			<?php
					echo $s_data['name'];
			?>	
					</h4></div>
					<div class="col-md-1"><h4>
			<?php	
							
				$data = array(
				        'name'          => 'student_id['.$s_id.']',
				        'id'            => $s_id,
				        'value'         => $s_id,
				        'checked'       => FALSE,
				        'style'         => 'margin:10px'
				);
				
				echo form_checkbox($data);
				?>	
					</h4>
					</div>
			</div><!-- Row end -->
				<br />
				<br />
				<?php
			}
		echo form_submit('student_delete', 'Delete Selected');
		echo form_close(); 

	}	

?>