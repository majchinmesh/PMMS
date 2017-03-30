	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
         <!--  -->
          
          <a class="navbar-brand" href="<?php echo base_url()."home" ; ?>">Home</a>
          <!--<a class="navbar-brand" href="<?php echo base_url()."orders" ; ?>">Orders</a> -->
         
          
          <?php 
          
          	$data = $this->session->userdata ; 
			
          	if( isset($data['logged_in'] )){
          		
				if ($data['logged_in']['admin'] == 1 ){
					
					?>
						 <a class="navbar-brand" href="<?php echo base_url()."admin" ; ?>">Admin</a>			
					<?php
					
				}
				
          ?>  
          			<a class="navbar-brand" href="<?php echo base_url()."logout" ; ?>">Logout</a>
        	<?php }
        	
			else { 
        
        	?>		<a class="navbar-brand" href="<?php echo base_url()."login" ; ?>">Login</a>
        			<!--<a class="navbar-brand" href="<?php echo base_url()."register" ; ?>">Register</a>-->
        
        	<?php
        	
			}
        	?>
        
        </div>
        <!--
        <div id="navbar" class="navbar-collapse collapse">
          	<a class="navbar-brand navbar-right " href="<?php echo base_url(); ?>">Order - it</a>
        </div><!--  navbar-collapse -->
      	
      </div>
    </nav>