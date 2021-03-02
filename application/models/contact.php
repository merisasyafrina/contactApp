<?php

class Contact extends CI_Model{
    public function get_contact(){
        return $this->db->get('contacts')->result_array();
    }
    public function input_data($data){
        $this->db->insert('contacts', $data);
    }
    public function edit_data($data, $id){
        $this->db->where('id', $id);
        $this->db->update('contacts', $data);
    }
    public function get_contactDetail($id){
        $this->db->where('id', $id);
        $query = $this->db->get('contacts');
        return $query->row();
    }
    public function delete_data($id){
        $this->db->where('id', $id);
        $this->db->delete('contacts');
    }
}

?>