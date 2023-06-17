<?php
    class crud_model extends CI_Model{
        public function getAllProducts(){
            $query=$this->db->get('crud_table');
            if($query){
                return $query->result();
            }
        }
        public function insert()
        {    
            $data = array(
                'name' => $this->input->post('name'),
                'roll_no' => $this->input->post('roll_no')
            );
            return $this->db->insert('crud_table', $data);
        }

        public function update($id) 
        {
            $data=array(
                'name' => $this->input->post('name'),
                'roll_no'=> $this->input->post('roll_no')
            );
            if($id==0){
                return $this->db->insert('crud_table',$data);
            }else{
                $this->db->where('sno',$id);
                return $this->db->update('crud_table',$data);
            }    	
    
        }
    }

?>