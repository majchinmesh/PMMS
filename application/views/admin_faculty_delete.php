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
					  			
					  			<div class="col-md-3"><h3><b>Fid</b></h3></div>
					  			<div class="col-md-4"><h3><b>Name</b></h3></div>
					  			<div class="col-md-1"><h3><b>Delete</b></h3></div>
					  			
					 		 	<div class="col-md-2"></div>
			
			</div>
			<hr  style="border-width: 5px;">
			<br />
			<br />



		<?php
		echo form_open('form_help/faculty_delete');
	
			foreach($faculty_list as $f_id => $f_name ){ 
			
			
			?>
				
				
		  		
		  		<div class="row">	
		  			<div class="col-md-2"></div>
		 		 	<div class="col-md-3"><h4>
			
			<?php
					echo $f_id ;
			?>				
			
					</h4></div>
					<div class="col-md-4"><h4>
			<?php
					echo $f_name;
			?>	
					</h4></div>
					<div class="col-md-1"><h4>
			<?php	
							
				$data = array(
				        'name'          => 'faculty_id['.$f_id.']',
				        'id'            => $f_id,
				        'value'         => $f_id,
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
		echo form_submit('faculty_delete', 'Delete Selected');
		echo form_close(); 

	}	

?>