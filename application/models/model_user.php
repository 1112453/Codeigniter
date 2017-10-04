<?php
class Model_user extends CI_Model{
    var $id;
    var $account;
    var $password;
    var $mail;
    
    function insert_user($data=array()){
        $query = $this->db->query("SELECT account FROM user WHERE account =".$this->db->escape($data['account'])."limit 1");
        return $query->num_rows() == 0? $this->db->insert('user',$data) : FALSE;
    }
    
    function get_user($data=array()){
        
    }

}
?>