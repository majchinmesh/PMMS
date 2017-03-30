<?php

if( !isset($display_message)){

?>				
<div class="row">
  <div class="col-md-1"><h4></h4></div>
  <div class="col-md-1"><h4>MID</h4></div>
  <div class="col-md-1"><h4>Roll</h4></div>
  <div class="col-md-2"><h4>Name</h4></div>
  <div class="col-md-2"><h4>Under You</h4></div>
  <div class="col-md-1"><h4>Evaluated</h4></div>
  <div class="col-md-2"><h4>Marks Given</h4></div>
  <div class="col-md-1"><h4>Marks</h4></div>
  <div class="col-md-1"></div>
</div>

<br /><br />
<?php

}
	
?>	
	
		<?php 
		
			if(isset($students) and isset($s_data) ){
				
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
		   			 		  <div class="col-md-1"></div>
							  <div class="col-md-1"><h5><?php echo $marks_id ?></h5></div>
							  <div class="col-md-1"><h5><?php echo $s_data[$s_id]['roll'] ?></h5></div>
							  <div class="col-md-2"><h5><?php echo $s_data[$s_id]['name'] ?></h5></div>
							  <div class="col-md-2"><h5><?php if ($is_sup == 1 ) echo "Yes" ;else echo "No" ; ?></h5></div>
							  <div class="col-md-1"><h5><?php if ($marked == 1 ) echo "Yes" ;else echo "No" ; ?></h5></div>
							  <div class="col-md-2"><h5><?php if ($marked == 1 ) echo $marks ;else echo "-" ; ?></h5></div>
							  <div class="col-md-1">
							  		
							  		<?php
														
										
										$data = array(
										  'name' => 'marks['.$marks_id.']',
										  'id' => $marks_id,
										  'class' => 'form-control',
										  'type' => 'numeric'
										);
										
										/*
										if($is_sup == 1){
											$data['value'] = "< 60" ;
											
										}else{
											$data['value'] = "< 40" ;
										}
										*/
										
										if($marked == 0 ){
											echo form_input($data);
										}
										?>
							  	
							  </div>
							  <div class="col-md-1">
							  	<?php
							  		if($marked != 1){
								  		if($is_sup == 1){
												echo "<h5> max 60 </h5>" ;
												
											}else{
												echo "<h5> max 40 </h5>" ; ;
											}
									}
							  	?>
							  	
							  </div>
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
				echo '<h2><a href="'.base_url().'home">Click </a> to go back home</h2>';
				
			}
			if (isset($error_message)){
				
				echo "<h2>".$error_message."</h2>"	;
				
			}
		
		
		?>
	