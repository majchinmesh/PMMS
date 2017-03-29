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
				
				$data[$faculty_id] = $mark ;
			}
			
		}
		else{
			
			return false ;
		}
		
		return $data ;
		
	}


	public function get_all_students_data()
	{
		$this->db->select('s_id');
		$this->db->from('students');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0 ) {
		
			$all_student_ids =  $query->result();
			
			foreach( $all_student_ids as $student ) {
					
				$s_id = $student->s_id ;
				
				$all_marks = $this->get_all_marks_of($s_id);	
			
				if($all_marks){		
					$data[$s_id] = $all_marks ;
				}
			}
		
		
		} else {
			
			return false;
		}
		
		
		
		return $data ;
	}


}

?>