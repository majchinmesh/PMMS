
	
		<?php 
		
			if(isset($students)){
				
				echo form_open('form_help/give_marks');
				
						foreach($students as $student ) {
		   			 		$marks_id = $student->m_id ; 
		   			 		$f_id = $student->m_f_id ;
							$s_id = $student->m_s_id ;
							$is_sup = $student->m_is_sup ;
							$marked = $student->m_marked ;
							$marks = $student->m_marks ;
							 
							
		   			 		?>
		   			 		<div class="row">
		   			 		  <div class="col-md-2"></div>
							  <div class="col-md-1"><?php echo $marks_id ?></div>
							  <div class="col-md-1"><?php echo $f_id ?></div>
							  <div class="col-md-2"><?php echo $s_id ?> </div>
							  <div class="col-md-1"><?php echo $is_sup ?></div>
							  <div class="col-md-1"><?php echo $marked ?></div>
							  <div class="col-md-1"><?php echo $marks ?></div>
							  <div class="col-md-1">
							  		
							  		<?php
														
										
										$data = array(
										  'name' => 'marks['.$marks_id.']',
										  'id' => $marks_id,
										  'class' => 'form-control',
										  'type' => 'numeric'
										);
										
										if($marked == 0 ){
											echo form_input($data);
										}
										?>
							  	
							  </div>
							  <div class="col-md-2"></div>
							</div>
		   			 		
		   			 		
							<?php
							echo'<br />';
							echo'<br />';
						}
						
				echo"<br/>";
				echo"<br/>";
						
							
				echo form_submit('submit', 'Submit all marks ');
					
				echo form_close();
						
			}
			
			if(isset($display_message)){
				
				echo "<h2>".$display_message."</h2>"	;
				echo '<h3><a href="'.base_url().'home">Click </a> to go back home</h3>';
				
			}
			if (isset($error_message)){
				
				echo "<h2>".$error_message."</h2>"	;
				
			}
		
		
		?>
	