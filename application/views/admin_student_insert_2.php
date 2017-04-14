<?php
	
		$attributes = array(
		        'class' => 'mycustomclass',
		        'style' => 'color: #000;'
				);
	
				
			$Students_faculties = Array(
			'Supervisor' =>  0 ,
			'Exeminar_1' => 1 ,
			'Exeminar_2' => 2 ,
			'Exeminar_3' => 3 
			);

	

	if(isset($error_message)){
		
		echo '<h3 class="h3_aligne">'. $error_message . '</h3>' ;
	}
	else if (isset($message_display)){
		
		echo '<h3 class="h3_aligne" >'.$message_display. '</h3>' ;
	}
	
	else{
		
		echo form_open('form_help/new_student_insert');
	
				
			
				?>
				<div class="row">
		
					<div class="col-md-2"></div>
					<div class="col-md-3">
					
					<?php
					echo form_label('Name','name' , $attributes);
					?>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php
					
					echo form_label('Supervisor','supervisor' , $attributes);
					?>
					</div>
					<div class="col-md-2"></div>					
				</div>
				
				
				
				<div class="row">
		
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php
					
					$data = array(
			        'name'          => 'name' ,
			        'id'            => 'name',
			        'value'         => '',
			        'maxlength'     => '100',
			        'size'          => '50',
			        'style'         => 'width:80%'
					);
		
					echo form_input($data);
					
					
					?>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php

					
					echo form_dropdown( "Supervisor" , $faculty_list,'','style="width: 80%;height:40px;"');
					
					
					?>
					</div>
					<div class="col-md-2"></div>					
				</div>
				</br>
				
				
				
				
				
				
				
				
				
				
				</br>
				<div class="row">
		
					<div class="col-md-2"></div>
					<div class="col-md-3">
					
					<?php
					echo form_label('Roll','roll' , $attributes);
					?>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php
					
					echo form_label('Exeminar 1','exeminar1' , $attributes);
					?>
					</div>
					<div class="col-md-2"></div>					
				</div>
				
				
				
				
				
				
				<div class="row">
		
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php
					
					$data = array(
			        'name'          => 'roll' ,
			        'id'            => 'roll',
			        'value'         => '',
			        'maxlength'     => '100',
			        'size'          => '50',
			        'style'         => 'width:80%'
					);
		
					echo form_input($data);
					
					
					?>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php
					
					echo form_dropdown( "Exeminar_1" , $faculty_list,'','style="width: 80%;height:40px;"');
					
					?>
					</div>
					<div class="col-md-2"></div>					
				</div>
				<br/>
				
				
				
				
				
				
				
				
				
				</br>
				<div class="row">
		
					<div class="col-md-2"></div>
					<div class="col-md-3">
					
					<?php
					echo form_label('Email','email' , $attributes);
					?>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php
					
					echo form_label('Exeminar 2','exeminar2' , $attributes);
					?>
					</div>
					<div class="col-md-2"></div>					
				</div>
				
				
				
				
				
				
				
				
				<div class="row">
		
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php
					
					$data = array(
			        'name'          => 'email' ,
			        'id'            => 'email',
			        'value'         => '',
			        'maxlength'     => '100',
			        'size'          => '50',
			        'style'         => 'width:80%'
					);
		
					echo form_input($data);
					
					
					?>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php
					
					echo form_dropdown( "Exeminar_2" , $faculty_list,'','style="width: 80%;height:40px;"');
					
					?>
					</div>
					<div class="col-md-2"></div>					
				</div>
				</br>
				</br>
				
				
				
				
				
				
				
				
				
				
				
				
				<div class="row">
		
					<div class="col-md-2"></div>
					<div class="col-md-3">
					
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php
					
					echo form_label('Exeminar 3','exeminar3' , $attributes);
					?>
					</div>
					<div class="col-md-2"></div>					
				</div>
				
				
	
	
	
				
				<div class="row">
		
					<div class="col-md-2"></div>
					<div class="col-md-3">
				
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-3">
					<?php
					
					echo form_dropdown( "Exeminar_3" , $faculty_list,'','style="width: 80%;height:40px;"');
					
					?>
					</div>
					<div class="col-md-2"></div>					
				</div>
				</br>
	
	
	
	
				<?php
	
	
	
		echo form_submit('student_insert', 'Add student');
		echo form_close(); 

	}	

?>