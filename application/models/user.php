<?php

class User extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function addUser($login, $passw, $email, $regdate, $status){
        $data = [
            'login' => $login,
            'passw' => $passw,
            'email'=> $email,
            'regdate' => $regdate,
            'status' => $status
        ];
        $this->db->insert('users', $data);
    }
    
    public function checkUser($login, $passw) {
        $this->db->select('login', 'passw');
        $condition = ['login' => $login,'passw' => $passw,];
        $res = $this->db->get_where('users', $condition);
        $arr = $res->result_array();
        if(count($arr)>0){return TRUE;}
        else{return FALSE;}
    }
    
    public function username_exists($username) {
        $this->db->select('login');
        $condition = ['login' => $username];
        $res = $this->db->get_where('users', $condition);
        $arr = $res->result_array();
        if(count($arr)>0){return TRUE;}
        else{return FALSE;}
    }
    
    public function get_user_id_by_user($user) {
        $this->db->select('id');
        $condition = ['login'=>$user];      
        $res = $this->db->get_where('users', $condition);
        $arr = $res->result();
        
        return $arr[0]->id;    
    }
}
