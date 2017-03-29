
<?php 
			
			if (isset($error_message)) {
				
				echo '<h3>'.$error_message.'</h3>';
				
			}
			else if(isset($orders)){
				
				
				foreach ($orders as $key => $value) {
					
					$order_details = $value['order_details'] ;
					$all_foods = $value['foods'] ; 
					
					$order_id = $order_details->id ;
					$order_time = $order_details->order_time ;
					$order_placed_by = $order_details->user_id ;
					
					echo "order id : ".$order_id.'<br />' ;
					echo "order placed at : ".$order_time.'<br />';
					echo "order placed by : ".$order_placed_by.'<br />' ;
					
					echo "<br />" ;
					foreach ($all_foods as $key => $food ) {
						
						$food_id = $food->id	;
						$food_title = $food->title ;
						$food_pic_link = $food->photo_link ;
						$food_ingredients = $food->ingredients ;
						$food_price = $food->price ;
						$food_veg = $food->veg ;
						
						echo "food id : ". $food_id.'<br />' ;
						echo "food title : ". $food_title.'<br />' ;
						echo "food picture link : ".$food_pic_link.'<br />' ;
						echo "food ingredients : ". $food_ingredients.'<br />' ;
						echo "food price : ". $food_price.'<br />' ;
						echo "food veg : ". $food_veg.'<br />' ;
						
						
						echo "<br />" ;
						
					}
					
					
					
					/*
					print_r($value['order_details']);
					
					echo"<br /><br /><br /><br />";
					
					print_r($value['foods']);
					
					 */
						
					echo"<br /><br /><br />";
					echo"<br /><br /><br />";
					echo"<br /><br /><br />";
				
					 
				}
				
				
			}
			
				
				
				
				/*
				echo form_open('form_help/place_order');
				
						foreach($order as $orders ) {
							
		   			 		echo $item->id;
							echo"    ";
							echo $item->title;
							echo"    ";
							echo '<img src="'.$item->photo_link.'" class="food_icon">';
							echo"    ";
							echo $item->ingredients;
							echo"    ";
							echo $item->price;
							echo"    ";
							echo $item->veg;
							echo"    ";
							
							$data = array(
							        'name'          => 'order[]',
							        'id'            => $item->id,
							        'value'         => $item->id,
							        'checked'       => FALSE,
							        'style'         => 'margin:10px'
							);
							
							echo form_checkbox($data);
							
							echo'<br />';
							echo'<br />';
						}
						
				echo"<br/>";
				echo"<br/>";
						
							
				echo form_submit('submit', 'Place Order');
					
				echo form_close();
						
			}
			else if(isset($order_confirm_message)){
				
				echo "<h2>".$order_confirm_message."</h2>"	;
				echo '<h3><a href="'.base_url().'home">Click </a> to go back home</h3>';
				
			}
			else if (isset($order_failed)){
				
				echo "<h2>".$order_failed."</h2>"	;
				
			}
		
		
			*/ 
				
		?>
	