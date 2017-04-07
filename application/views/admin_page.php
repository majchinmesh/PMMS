
<?php

$REQUIRED_DATA = array (
    array('Marks_id', 'Roll','Student Name', 'Supervisor' ,'M1','Examiner 1' , 'M2' , 'Examiner 2' , 'M3' , 'Examiner 3', 'M4'  ,'MT')
);




 function are_all_marked($marks)
{
	foreach ($marks as $f_id => $f_data) {
		
		if ( $f_data['marked'] != 1 ){
			
			return false ;
		}
		
	}
	
	return true ;
}

$counter = 0 ;

if(isset($all_student_data) and isset($all_faculty_data) ){
	if($all_student_data and $all_faculty_data ){
			
	?>
	
	
	<div class="row">
	  <div class="col-md-1"><h4></h4></div>
	  <div class="col-md-1"><h4>Roll</h4></div>
	  <div class="col-md-1"><h4>Student</h4></div>
	  <div class="col-md-1"><h4>Supervisor</h4></div>
	  <div class="col-md-1"><h4>Marks</h4></div>
	  <div class="col-md-1"><h4>Examiner 1</h4></div>
	  <div class="col-md-1"><h4>Marks</h4></div>
	  <div class="col-md-1"><h4>Examiner 2</h4></div>
	  <div class="col-md-1"><h4>Marks</h4></div>
	  <div class="col-md-1"><h4>Examiner 3</h4></div>
	  <div class="col-md-1"><h4>Marks</h4></div>
	  <div class="col-md-1"><h4>Total</h4></div>
	</div>
	
	<br />
	<br />
	
	
	
	<?php
	
	foreach($all_student_data as $s_id => $s_data ){
		$counter += 1 ;
		$ROW_DATA = Array();
		array_push($ROW_DATA,$counter );
		$s_name = $s_data['name'] ;
		$s_roll = $s_data['roll'] ;
		$marks = $s_data['marks'] ;
		array_push($ROW_DATA,$s_roll,$s_name );
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
			$marked = $f_data['marked'];

			if ($is_sup == 1) {			
				$sup_marks += intval($mark) ;
				
				////
				array_push($ROW_DATA,$all_faculty_data[$f_id],$mark);
				?>
				
							
				<div class="col-md-1"><?php echo'<h5>'.$all_faculty_data[$f_id].'</h5>'?></div>
				<div class="col-md-1"><?php if ($marked == 1 )  echo'<h5>'.$mark.'</h5>' ; else echo'<h5>-</h5>' ; ?></div>
				<?php
			}
		
		}

		foreach ($marks as $f_id => $f_data) {
			
			$mark = $f_data['marks'];
			$is_sup = $f_data['is_sup'];
			$marked = $f_data['marked'];
	
			if ($is_sup == 0 ) {			
				$exm_marks += intval($mark) ;
				
				////
				array_push($ROW_DATA,$all_faculty_data[$f_id],$mark);
				?>
				
				<div class="col-md-1"><?php echo'<h5>'.$all_faculty_data[$f_id].'</h5>'?></div>
				<div class="col-md-1"><?php if ($marked == 1 )  echo'<h5>'.$mark.'</h5>' ; else echo'<h5>-</h5>' ; ?></div>
				<?php
			}
		
		}
		
				
		?>
		<div class="col-md-1"><h5>
				<?php
						if($all_marked){
							
							$total_marks = $sup_marks + $exm_marks/3 ;
							$int_total_marks = intval($total_marks);
							
							if($total_marks > $int_total_marks ){
								
								$int_total_marks+=1 ;			
							
							}
							////
							array_push($ROW_DATA,$int_total_marks);
							echo intval($int_total_marks) ;
						}
						else{
							
							echo '-' ;
						}
					
				?>			
				</h5>
			 </div>
		</div>
		<?php
		
		echo "<br /><br />";
		
		array_push($REQUIRED_DATA,$ROW_DATA);
		
		}
		
	}

	$fp = fopen('file.csv', 'w');
	
	foreach ($REQUIRED_DATA as $fields) {
    	fputcsv($fp, $fields);
	}
	
	
}
else if ( isset($error_message)){
	
	echo "<h2>".$error_message."</h2>";
	
}
else{
	
	echo "<h2>Some Problem</h2>";
	
}


?>
