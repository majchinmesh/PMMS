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
					  			
					  			<div class="col-md-1"><h3><b>Mid</b></h3></div>
					  			<div class="col-md-3"><h3><b>Student</b></h3></div>
					  			<div class="col-md-3"><h3><b>Faculty</b></h3></div>
					  			<div class="col-md-1"><h3><b>Marks</b></h3></div>
					  			<div class="col-md-1"><h3><b>Reset</b></h3></div>
					  			
					 		 	<div class="col-md-1"></div>
			
			</div>
			<hr  style="border-width: 5px;">
			<br />
			<br />



		<?php
		echo form_open('form_help/marks_reset');
	
			foreach($mark_list as $m_id => $m_data ){ 
			
				
				if($m_data['is_sup'] == 1 ){
					
					echo '<div class="row sup_hilight">';	
					
				}
				else{
					
					echo '<div class="row">';
				}
			
			?>
				
				
		  		
		  		
		  			<div class="col-md-2"></div>
		 		 	<div class="col-md-1"><h4>
			
			<?php
					echo $m_id ;
			?>
					</h4></div>
					<div class="col-md-3"><h4>
			<?php
			
					echo $m_data['student'];
			?>				
					</h4></div>
					<div class="col-md-3"><h4>
			<?php
					echo $m_data['faculty'];
			?>				
					</h4></div>
					<div class="col-md-1"><h4>
						
			<?php
					echo $m_data['marks'];
				
			?>
					</h4></div>
					<div class="col-md-1"><h4>
			<?php	
							
				$data = array(
				        'name'          => 'marks_id['.$m_id.']',
				        'id'            => $m_id,
				        'value'         => $m_id,
				        'checked'       => FALSE,
				        'style'         => 'margin:10px'
				);
				
				echo form_checkbox($data);
				?>	
					</h4>
					</div>
					
				<div class="col-md-1"></div>	
			</div><!-- Row end -->
				<br />
				<br />
				<?php
			}
		echo form_submit('marks_reset', 'Reset Selected');
		echo form_close(); 

	}	

?>