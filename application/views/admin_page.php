<div class="row">
  <div class="col-md-1"><h4></h4></div>
  <div class="col-md-1"><h4>Roll</h4></div>
  <div class="col-md-1"><h4>Student</h4></div>
  <div class="col-md-1"><h4>Supervisor</h4></div>
  <div class="col-md-1"><h4>Marks</h4></div>
  <div class="col-md-1"><h4>Examiner</h4></div>
  <div class="col-md-1"><h4>Marks</h4></div>
  <div class="col-md-1"><h4>Examiner</h4></div>
  <div class="col-md-1"><h4>Marks</h4></div>
  <div class="col-md-1"><h4>Examiner</h4></div>
  <div class="col-md-1"><h4>Marks</h4></div>
  <div class="col-md-1"><h4>Total</h4></div>
</div>

<br />
<br />

<?php

 function are_all_marked($marks)
{
	foreach ($marks as $f_id => $f_data) {
		
		if ( $f_data['marked'] != 1 ){
			
			return false ;
		}
		
	}
	
	return true ;
}


if(isset($all_student_data) and isset($all_faculty_data) ){
	
	foreach($all_student_data as $s_id => $s_data ){
		
		$s_name = $s_data['name'] ;
		$s_roll = $s_data['roll'] ;
		$marks = $s_data['marks'] ;
		
		$all_marked = are_all_marked($marks);
		$sup_marks = 0;
		$exm_marks = 0;
	
		?>
		<div class="row <?php if($all_marked) echo 'row_marked'; else echo 'row_unmarked' ; ?>" >
			
							  <div class="col-md-1"></div>
							  <div class="col-md-1"><?php echo'<h5>'.$s_roll.'</h5>'?></div>
							  <div class="col-md-1"><?php echo'<h5>'.$s_name.'</h5>'?></div>
		<?php
		
		
		

		
		
		foreach ($marks as $f_id => $f_data) {
			
			$mark = $f_data['marks'];
			$is_sup = $f_data['is_sup'];

			if ($is_sup == 1) {			
				$sup_marks += intval($mark) ;
				?>
				
				<div class="col-md-1"><?php echo'<h5>'.$all_faculty_data[$f_id].'</h5>'?></div>
				<div class="col-md-1"><?php echo'<h5>'.$mark.'</h5>'?></div>
				<?php
			}
		
		}

		foreach ($marks as $f_id => $f_data) {
			
			$mark = $f_data['marks'];
			$is_sup = $f_data['is_sup'];

			if ($is_sup == 0 ) {			
				$exm_marks += intval($mark) ;
				?>
				
				<div class="col-md-1"><?php echo'<h5>'.$all_faculty_data[$f_id].'</h5>'?></div>
				<div class="col-md-1"><?php echo'<h5>'.$mark.'</h5>'?></div>
				<?php
			}
		
		}
		
				
		?>
		<div class="col-md-1">
				<?php
						if($all_marked){
							
							$total_marks = $sup_marks + $exm_marks/3 ;
							$int_total_marks = intval($total_marks);
							
							if($total_marks > $int_total_marks ){
								
								$int_total_marks+=1 ;			
							
							}
							echo intval($int_total_marks) ;
						}
						else{
							
							echo '-' ;
						}
					
				?>			
			
			 </div>
		</div>
		<?php
		
		echo "<br /><br />";
	}

	?>
	
	<div class="row">
	  <div class="col-md-3"></div>
	  <div class="col-md-2">
	  	
	  	<a href="admin/faculty_insert" >
	  		<button class="btn-primary btn_link" type="button">Add Faculty</button>
	  	</a>
	  	
	  </div>
	  <div class="col-md-2"></div>
	  <div class="col-md-2">
	  	
	  	<a href="admin/student_insert"> 
	  		<button class="btn-primary btn_link" type="button">Add Student</button>
	  	</a>
	  	
	  </div>
	  <div class="col-md-3"></div>
	</div>
	
	
	<?php

	
	
	
}
else{
	
	echo "Some problem!";
	
}


?>
