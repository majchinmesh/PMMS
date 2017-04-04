<?php

Class Marks_Database extends CI_Model {

	// Insert registration data in database
	public function marks_insert($data) {
	
		// Query to check whether marks already entered or not
		$condition = "m_f_id =" . "'" . $data['m_f_id'] . "' AND m_s_id =". "'".$data['m_s_id'] ."'" ;
		$this->db->select('m_marked');
		$this->db->from('marks');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		
		if ($query->num_rows() > 0 ) {
			
			$result = $query->result();
			
			if ( $result[0]->m_marked == 0) {
				
				// Query to insert data in database
				$this->db->replace('marks', $data);
			
				if ($this->db->affected_rows() > 0) {
					return true;
				}
				else {
					return false ;
				}
			}
			else {
				return false ;
			}
			
		} else {
			return false;
		}
	
	}
	
	
	private function add_data_in_marks_table($data,$current_added_student_id)
	{
		$DATA_1 = Array(
			'm_f_id'=> $data['s_sup_id'],
			'm_s_id'=> $current_added_student_id ,
			'm_is_sup'=> 1 ,
			'm_marked' => 0,
			'm_marks' => 0
		);
		
		$DATA_2 = Array(
			'm_f_id'=> $data['s_ex1_id'],
			'm_s_id'=> $current_added_student_id ,
			'm_is_sup'=> 0 ,
			'm_marked' => 0,
			'm_marks' => 0
		);
		
		$DATA_3 = Array(
			'm_f_id'=> $data['s_ex2_id'],
			'm_s_id'=> $current_added_student_id ,
			'm_is_sup'=> 0 ,
			'm_marked' => 0,
			'm_marks' => 0
		);
		
		$DATA_4 = Array(
			'm_f_id'=> $data['s_ex3_id'],
			'm_s_id'=> $current_added_student_id ,
			'm_is_sup'=> 0 ,
			'm_marked' => 0,
			'm_marks' => 0
		);
		
		// not checking any success condition for these as they are straight foward inserts
		$this->db->insert('marks', $DATA_1);
		$this->db->insert('marks', $DATA_2);
		$this->db->insert('marks', $DATA_3);
		$this->db->insert('marks', $DATA_4);
			
		return True ;
	}
	
	
	
	public function student_insert($data) {
	
		// Query to check whether faculty with same roll exist or not
		$condition = "s_roll =" . "'" . $data['s_roll']."'" ;
		$this->db->select('s_id');
		$this->db->from('students');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		
		if ($query->num_rows() > 0 ) {
				
			
			return false ;
			
			
		
		} else {
			
			$this->db->insert('students', $data);	
			
			if($this->db->affected_rows() > 0 ){
				
				// now that the student is addded, add the marks fileds in the marks table
				
				$current_added_student_id = $this->get_max_student_id();
				if ($current_added_student_id){
						
					$result = $this->add_data_in_marks_table($data,$current_added_student_id);
					
					if($result) {
						
						return true ;
					}
					else {
	
						return false ;

					}
					
				}
				else{
					
					return false ;
				}
				
			}
			else {
				
				return false ;
				
			}
			
		}
	
	}


	
	private function get_max_student_id()
	{
		
		
		$this->db->select_max('s_id');
		$this->db->from('students');
		$this->db->limit(1);		
					
		$query = $this->db->get();
		
		if ($query->num_rows() > 0 ) {
				
			$result = $query->result();
			
			return $result[0]->s_id;
		}
		else{
				
			return false ;
			
		}		
	}
	
	
	
	public function faculty_insert($data) {
	
		// Query to check whether faculty with same username exist or not
		$condition = "f_user_name =" . "'" . $data['f_user_name']."'" ;
		$this->db->select('f_id');
		$this->db->from('faculty');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		
		if ($query->num_rows() > 0 ) {
				
			
			return false ;
			
			
		
		} else {
			
			$this->db->insert('faculty', $data);	
			
			if($this->db->affected_rows() > 0 ){
				
				return true ;
			}
			else {
				
				return false ;
				
			}
			
		}
	
	}
	


	public function	get_students_to_grade($f_id){
		
		$condition = "m_f_id= '".$f_id."'" ;
		
		$this->db->select('*');
		$this->db->from('marks');
		$this->db->where($condition);
	
	
		$query = $this->db->get();
	
		if ($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return false;
		}
		
	}

	
	
	private function get_all_marks_of($s_id)
	{
		$condition = "m_s_id= '".$s_id."'" ;
		
		$this->db->select('*');
		$this->db->from('marks');
		$this->db->where($condition);
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0 ) {
			
			$all_marks = $query->result() ;
			
			foreach ($all_marks as $marks) {
				
				$faculty_id = $marks->m_f_id ;
				$mark = $marks->m_marks ;
				
				$data[$faculty_id] = Array(
				'marks' =>	$mark,
				'is_sup' => $marks->m_is_sup ,
				'marked' =>  $marks->m_marked 
				);
			}
			
		}
		else{
			
			return false ;
		}
		
		return $data ;
		
	}



	public function get_only_students_data()
	{
		$this->db->select('*');
		$this->db->from('students');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0 ) {
		
			$all_student_ids =  $query->result();
			
			foreach( $all_student_ids as $student ) {
					
				$s_id = $student->s_id ;
				$s_name = $student->s_name;
				$s_roll = $student->s_roll ;
			
				
				$data[$s_id] = Array (
					
					'roll'=>$s_roll ,
					'name'=> $s_name 
				);
			}
		
		} else {
			
			return false;
		}
		
		return $data ;
	}



	public function get_all_students_data()
	{
		$this->db->select('*');
		$this->db->from('students');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0 ) {
		
			$all_student_ids =  $query->result();
			
			foreach( $all_student_ids as $student ) {
					
				$s_id = $student->s_id ;
				$s_name = $student->s_name;
				$s_roll = $student->s_roll;
				
				$all_marks = $this->get_all_marks_of($s_id);	
			
				if($all_marks){		
					$data[$s_id] = Array (
					
					'marks'=>$all_marks ,
					'name'=> $s_name,
					'roll'=> $s_roll 
					);
				}
			}
		
		
		} else {
			
			return false;
		}
		
		return $data ;
	}



	public function get_all_faculty_data()
	{
		$this->db->select('*');
		$this->db->from('faculty');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0 ) {
			
			$result = $query->result() ;
			
			foreach($result as $row_no => $row ){ 
		
				$data[$row->f_id] = $row->f_name ;
			}
			
			return( $data);
		
		} else {
			
			return false;
		}
		
		
		
		return $data ;
	}



    public function get_all_marks(){
    	
		$new_data = Array();
		
		
		$all_students = $this->get_only_students_data();
		
		if( $all_students == False ) {
			
			return False ;
			
		}
		
		
		$all_faculty = $this->get_all_faculty_data();
		
		if( $all_faculty == False ) {
			
			return False ;
			
		}
		
		
		$this->db->select('*');
		$this->db->from('marks');
		$query = $this->db->get();
		
		
		if ($query->num_rows() > 0 ) {
		
			$all_marks =  $query->result();
			
			$data = Array();
			
			foreach( $all_marks as $mark ) {
					
				if( $mark->m_marked == 1 ){
					
					$m_id = $mark->m_id ;
					$m_s_id = $mark->m_s_id ;
					$m_f_id = $mark->m_f_id ;
					$m_is_sup = $mark->m_is_sup ;
					$m_marks = $mark->m_marks ;
					
					$data[$m_id] = Array (
						
						'student'=> $all_students[$m_s_id]['name'], 
						'faculty'=> $all_faculty[$m_f_id] ,
						'is_sup' => $m_is_sup ,
						'marks' => $m_marks 
					);
				}
			}
		
		} else {
			
			return false;
		}
	
		return $data ;
    }

}

?>