	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">    
         <!--  -->
          
          <a class="navbar-brand" href="<?php echo base_url()."home" ; ?>">PMMS</a>
          <!--<a class="navbar-brand" href="<?php echo base_url()."orders" ; ?>">Orders</a> -->
         
        </div> 
        <ul class="nav navbar-nav">    
        	<li class = "Active"><a class="navbar-brand" href="<?php echo base_url()."home" ; ?>">Home</a></li>
          <?php 
          
          	$data = $this->session->userdata ; 
			
          	if( isset($data['logged_in'] )){
          		
				if ($data['logged_in']['admin'] == 1 ){
					
					?>
						<li class="dropdown">
					        <a class="dropdown-toggle navbar-brand" data-toggle="dropdown" href="#">Admin
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu  bg_black">
					          <li><a class="navbar-brand" href="<?php echo base_url()."admin" ; ?>">All Marks</a></li>
					          <li><a class="navbar-brand" href="<?php echo base_url()."admin/faculty_insert"; ?>">Add Faculty</a></li>
					          <li><a class="navbar-brand" href="<?php echo base_url()."admin/student_insert" ; ?>">Add Student</a></li>
        					  <li><a class="navbar-brand" href="<?php echo base_url()."admin/marks_reset" ; ?>">Reset Marks</a></li> 
        					  <li><a class="navbar-brand" href="<?php echo base_url()."admin/student_delete" ; ?>">Remove Student</a></li>
        					  <li><a class="navbar-brand" href="<?php echo base_url()."admin/faculty_delete" ; ?>">Remove Faculty</a></li>   	
        					</ul>
      					</li>
		</ul>				 			
						 
					<?php
					
				}
				
          ?>  
          			<!--<ul class="nav navbar-nav navbar-right">-->
          				<li class="navbar-right"><a class="navbar-brand" href="<?php echo base_url()."logout" ; ?>">Logout</a></li>
        			
        	<?php }
        	
			else { 
        		
        	?>		<!--<ul class="nav navbar-nav navbar-right">-->
        				<li class="navbar-right"><a class="navbar-brand" href="<?php echo base_url()."login" ; ?>">Login</a></li>
        			
        			<!--<a class="navbar-brand" href="<?php echo base_url()."register" ; ?>">Register</a>-->
        
        	<?php
        	
			}
        	?>
        
        <!--
        <div id="navbar" class="navbar-collapse collapse">
          	<a class="navbar-brand navbar-right " href="<?php echo base_url(); ?>">Order - it</a>
        </div><!--  navbar-collapse -->
      	
      </div>
    </nav>