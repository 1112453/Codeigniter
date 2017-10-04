<?php
class Model_user extends CI_Model{
    var $id;
    var $account;
    var $password;
    var $mail;
    
    function insert_user($data){
        $query = $this->db->query("SELECT account FROM user WHERE account =".$this->db->escape($data['account'])."limit 1");
        return $query->num_rows() == 0? $this->db->insert('user',$data) : FALSE;
    }
    
    function get_user($data){
        $query = $this->db->query("SELECT account, password FROM user WHERE account =".$this->db->escape($data['account'])."AND password =".$this->db->escape($data['password'])."limit 1");
        return $query->num_rows() == 1? TRUE : FALSE;
    }
    
    function get_userbyid($id){
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        if($query->num_rows()){
            return $query->row();
        }
        return FALSE;
    }
    
    function getlist_user(){
        $query=$this->db->get("user");
        return $query->result();
    }
    
    function edit_user($data){
        $this->db->where('id', $data['id']);
        return $this->db->update('user',$data);
    }
    
    function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

}
?>