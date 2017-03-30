<?php
	
		$attributes = array(
		        'class' => 'mycustomclass',
		        'style' => 'color: #000;'
				);
		

	if(isset($error_message)){
		
		echo '<h3 class="h3_aligne">'. $error_message . '</h3>' ;
	}
	else if (isset($message_display)){
		
		echo '<h3 class="h3_aligne" >'.$message_display. '</h3>' ;
	}
	
	else{
		
		echo form_open('form_help/new_student_insert');
	
			$from_input_data = Array(
				'Name' => 'name',
				'Roll'	=> 'roll',
				'Email' => 'email'
				
			
			);
	
			foreach($from_input_data as $name => $value ){ 
			
			?>
				<!-- row start  -->
				<div class="row">
		  			<div class="col-md-4"></div>
		 		 	<div class="col-md-4">
		 
				<?php
			
			
				echo form_label($name,$value , $attributes);
				
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
	
		//
		$Students_faculties = Array(
			'Supervisor' =>  0 ,
			'Exeminar_1' => 1 ,
			'Exeminar_2' => 2 ,
			'Exeminar_3' => 3 
		);
		
		foreach ($Students_faculties as $ddm_name => $ddm_id ){
			
			?>
			<!-- row  start -->
			<div class="row">
		  			<div class="col-md-4"></div>
		 		 	<div class="col-md-4">
					<!--<h4><?php echo  $ddm_name ?></h4> -->
			<?php
			
			echo form_label($ddm_name,$value , $attributes);
				echo"<br/>";
			echo form_dropdown( $ddm_name , $faculty_list,'','style="width: 80%;height:40px;"');
														 // SELECTED	
			?>
			
			</div>
			 <div class="col-md-4"></div>
			</div> <!-- row end -->
			<br /><br />	
			
			<?php
			
			
		}
		
		echo form_submit('student_insert', 'Add student');
		echo form_close(); 

	}	

?>