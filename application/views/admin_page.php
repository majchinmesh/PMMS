



<?php

if(isset($all_student_data)){
	
	foreach($all_student_data as $s_id => $marks ){
	
		?>
		<div class="row">
							  <div class="col-md-1"></div>
							  <div class="col-md-2"><?php echo 'Student with id : <b>' .$s_id.'</b> got ' ; ?> </div>
		<?php
		
		
		foreach ($marks as $f_id => $mark) {
			
			?>
			<div class="col-md-2">
				
				<?php echo  $mark.' from faculty with id '.$f_id ; ?>
			
			</div>
			<?php
		
		}
		
		?>
		<div class="col-md-4"></div>
		</div>
		<?php
		
		echo "<br /><br /><br /><br />";
	}
	
}
else{
	
	echo "Some problem!";
	
}


?>






							
		
		
		   	



